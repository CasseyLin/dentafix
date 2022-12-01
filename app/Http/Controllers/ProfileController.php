<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function index(){
        return view('profile.index');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'gender'=>'required',
        ]);
        User::where('id',auth()->user()->id)
            ->update([
                'name'=>$request->name,
                'phone_number'=>$request->phone_number,
                'description'=>$request->description,
                'gender'=>$request->gender,
                'address'=>$request->address
            ]);
            return redirect()->back()->with('message', 'Your profile has been updated successfully!');

    }
    public function profilePic(Request $request){
        $this->validate($request, ['file'=>'
        required|image|mimes:jpeg,jpg,png']);
        if($request->hasFile('file')){
            $image = $request->file('file');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destination = public_path('/Images');
            $image->move($destination, $name);
            User::where('id',auth()->user()->id)->update([
                'image'=>$name
            ]);
            return redirect()->back()->with('message', 'Your profile picture has been updated successfully!');
        }
    }

    public function dentalPic(Request $request){
        $this->validate($request, ['file'=>'
        required|image|mimes:jpeg,jpg,png']);
        if($request->hasFile('file')){
            $dentalimage = $request->file('file');
            $name = time().'.'.$dentalimage->getClientOriginalExtension();
            $destination = public_path('/Images');
            $dentalimage->move($destination, $name);
            User::where('id',auth()->user()->id)->update([
                'dental_image'=>$name
            ]);
            return redirect()->back()->with('message', 'Your dental image has been updated successfully!');
        }
    }
}
