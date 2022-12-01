<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;

class ReservationController extends Controller
{
    public function index(){
        date_default_timezone_set('Asia/Kuala_Lumpur');

        $patients = Reservation::latest()->paginate(15);
        return view('reservation.index', compact('patients'));


    }

    public function Today(){
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $patients = Reservation::where('date',date('Y-m-d'))->where('status',0)->where('dentist_id',auth()->user()->id)->get(); //get only the dentist patients
        return view('reservation.today', compact('patients'));
    }
}
