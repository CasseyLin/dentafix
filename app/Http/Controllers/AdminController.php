<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        $users  = User::where('role_id','=',1)->get();
        return view('admin.admin.index',compact('users'));
    }

    public function create()
    {
        return view('admin.admin.create');
        
    }

    public function store(Request $request)
    {
        $this -> validate ($request, [
            'name'=> 'required',
            'email'=> 'required|unique:users',
            'password'=> 'required|min:7|max:15',
            'gender'=> 'required',
            'address'=> 'required',
            'phone_number'=> 'required|numeric',
            'image'=> 'required|mimes:jpg,jpeg,png',
            'description'=> 'required',
            'role_id'=> 'required']);

            $data = $request->all();
            $name = (new User)->userAvatar($request);

            $data['image'] = $name;
            $data['password'] = bcrypt($request->password);
            User::create($data);

            return redirect()->back()->with('message', 'A new admin has been added successfully!' );

    }

    public function show($id)
    {
        $user = User::find($id);
        return view('admin.admin.delete',compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.admin.edit', compact('user'));

    }

    public function update(Request $request, $id)
    {
        $this->UpdateValidation($request, $id);
        $data = $request->all();
        $user = User::find($id);
        $imageName = $user->image;
        $userPassword = $user->password;
        if($request->hasFile('image')){
            $imageName =(new User)->userAvatar($request);
            unlink(public_path('Images/'.$user->image));
        }
        $data['image'] = $imageName;
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }else{
            $data['password'] = $userPassword;
        }
        $user->update($data);
        return redirect()->route('admin.index')->with('message','Admin information has been updated successfully!');

    }

    public function destroy($id)
    {
        if(auth()->user()->id == $id){
            abort(401);
       }
       $user = User::find($id);
       $userDelete = $user->delete();
       if($userDelete){
        unlink(public_path('Images/'.$user->image));
       }
        return redirect()->route('admin.index')->with('message', 'An admin has been deleted successfully!');

    }

    public function UpdateValidation($request, $id){
        return $this->validate($request,[
            'name'=> 'required',
            'email'=> 'required|unique:users,email,'.$id,
            'gender'=> 'required',
            'address'=> 'required',
            'phone_number'=> 'required|numeric',
            'image'=> 'mimes:jpg,jpeg,png',
            'description'=> 'required',
            'role_id'=> 'required'
        ]);
    }
}
