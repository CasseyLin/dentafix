<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     //index for admin, dentist and patient
    public function index()
    {
        if(Auth::user()->role->name=="admin"||Auth::user()->role->name=="dentist"){
            return redirect('/dashboard');
        }
        return view('home');
    }
}
