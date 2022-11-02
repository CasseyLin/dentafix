<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;

class PatientListController extends Controller
{
    public function index(Request $request){
        date_default_timezone_set('Asia/Kuala_Lumpur');
        if($request->date){
            $reservations = Reservation::latest()->where('date', $request->date)->get();
            return view('admin.patientList.index', compact('reservations'));
                        
        }
        $reservations = Reservation::latest()->where('date', date('Y-m-d'))->get();
        return view('admin.patientList.index', compact('reservations'));
        
    }

    public function visitStatus($id){
        $reservation = Reservation::find($id);
        $reservation->status =! $reservation->status;
        $reservation->save();
        return redirect()->back();
    }

    public function allTimeAppointments(Request $request){
        date_default_timezone_set('Asia/Kuala_Lumpur');

        $reservations = Reservation::latest()->paginate(15);
        return view('admin.patientList.index', compact('reservations'));
        
        
    }

    public function appointmentToday(){
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $reservations = Reservation::latest()->where('date', date('Y-m-d'))->get();
        return view('admin.patientList.today', compact('reservations'));
    }
}
