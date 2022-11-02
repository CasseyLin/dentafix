<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Prescription;

class PrescriptionController extends Controller
{
    public function index(){

        date_default_timezone_set('Asia/Kuala_Lumpur');
        $reservations = Reservation::where('date',date('Y-m-d'))->where('status',1)->where('dentist_id',auth()->user()->id)->get(); //get only the dentist patients
        return view('prescription.index', compact('reservations'));
    }

    public function store(Request $request){

        $data = $request->all();
        $data['medicine'] = implode(',',$request->medicine);
        Prescription::create($data);
        return redirect()->back()->with('message','Prescription has been created!');
    }

    public function show($userId,$date){
        $prescription = Prescription::where('user_id', $userId)->where('date',$date)->first();
        return view('prescription.show',compact('prescription'));
    }

    public function prescribedPatients(){
        $patients = Prescription::get();
        return view('prescription.all',compact('patients'));
    }
}
