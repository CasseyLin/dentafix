<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DentistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users  = User::where('role_id','!=',3)->get();
        return view('admin.dentist.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dentist.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate ($request, [
            'name'=> 'required',
            'email'=> 'required|unique:users',
            'password'=> 'required|min:7|max:15',
            'gender'=> 'required',
            'address'=> 'required',
            'education'=> 'required',
            'phone_number'=> 'required|numeric',
            'image'=> 'required|mimes:jpg,jpeg,png',
            'service'=> 'required',
            'description'=> 'required',
            'role_id'=> 'required']);

            $data = $request->all();
            $name = (new User)->userAvatar($request);

            $data['image'] = $name;
            $data['password'] = bcrypt($request->password);
            User::create($data);

            return redirect()->back()->with('message', 'A new dentist has been added successfully!' );


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.dentist.delete',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.dentist.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        return redirect()->route('dentist.index')->with('message','Dentist information has been updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        return redirect()->route('dentist.index')->with('message', 'Dentist deleted successfully');

    }

    public function UpdateValidation($request, $id){
        return $this->validate($request,[
            'name'=> 'required',
            'email'=> 'required|unique:users,email,'.$id,
            'gender'=> 'required',
            'address'=> 'required',
            'education'=> 'required',
            'phone_number'=> 'required|numeric',
            'image'=> 'mimes:jpg,jpeg,png',
            'service'=> 'required',
            'description'=> 'required',
            'role_id'=> 'required'
        ]);
    }
   
}
