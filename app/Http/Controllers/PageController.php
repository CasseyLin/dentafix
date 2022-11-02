<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Timeslot;
use App\User;
use App\Reservation;
use App\Prescription;
use App\Mail\ReservationMail;

class PageController extends Controller
{
    public function index(){
        date_default_timezone_set('Asia/Kuala_Lumpur');
        if(request('date')){
            $dentists = $this->findDentist(request('date'));
            return view('welcome', compact('dentists'));
        }
        $dentists = Appointment::where('date', date('Y-m-d'))->get();
        return view('welcome', compact('dentists'));
    }

    public function show($dentistId, $date){
        $appointment = Appointment::where('user_id', $dentistId)->where('date', $date)->first();
        $timeslots = Timeslot::where('appointment_id', $appointment->id)->where('status',0 )->get();
        $user = User::where('id', $dentistId)->first();
        $dentist_id = $dentistId;
        return view('appointment', compact('timeslots','date', 'user','dentist_id'));
    }

    public function findDentist($date){
        $dentists = Appointment::where('date', $date)->get();
        return $dentists;
    }

    public function store(Request $request){
        date_default_timezone_set('Asia/Kuala_Lumpur');

        $request->validate(['time'=>'required']);
        $check = $this->checkBookingTimeInterval();
        if($check){
            return redirect()->back()->with('errmessage', 'You have already made an appointment. Please
            wait for the next day');
        }

        Reservation::create([
            'user_id'=>auth()->user()->id,
            'dentist_id'=>$request->dentistId,
            'time'=> $request->time,
            'date'=> $request->date,
            'status'=>0
        ]);

        Timeslot::where('appointment_id', $request->appointmentId)
            ->where('time', $request->time)
            ->update(['status'=>1]);

            //send email notifications
            $dentistName = User::where('id',$request->dentistId)->first();
            $mailInfo = [
                'name'=>auth()->user()->name,
                'time'=>$request->time,
                'date'=>$request->date,
                'dentistName' => $dentistName->name
            ];
            try{
                 \Mail::to(auth()->user()->email)->send(new ReservationMail($mailInfo));

            }catch(\Exception $e){}
            return redirect()->back()->with('message','Your appointment has been booked!');
        cancelBookings();
    }

    public function checkBookingTimeInterval(){
        return Reservation::orderby('id','desc')
            ->where('user_id',auth()->user()->id)
            ->whereDate('created_at',date('Y-m-d'))
            ->exists();
    }

    public function myAppointments(){
        $appointments = Reservation::latest()->where('user_id',auth()->user()->id)
            ->get();
        return view('appointment.index', compact('appointments'));
    }

    public function myPrescription(){
        $prescriptions = Prescription::where('user_id',auth()->user()->id)->get();
        return view('prescription.my-prescription', compact('prescriptions'));
    }

    public function dentistToday(Request $request){
        //with dentists info as well
        $dentists = Appointment::with('dentist')->whereDate('date',date('Y-m-d'))->get();
        return $dentists;
    }

    public function findDentists(Request $request){
        $dentists = Appointment::with('dentist')->whereDate('date', $request->date)->get();
        return $dentists;
    }

    public function cancelBook(Request $request){
        Timeslot::where('appointment_id', $request->appointmentId)
        ->where('time', $request->time)
        ->update(['status'=>0]);
        return redirect()->back()->with('message','Your appointment has been cancelled!');
    }
    
    public function cancelBookings(Request $request){
        $appointments = Reservation::with('dentist')->get();
        Timeslot::where('appointment_id')
            ->where('time')
            ->update(['status'=>2]);

        dd('request');
        return redirect()->route('my.appointment')->with('message', 'Appointment has been cancelled successufully');


    }

    public function destroy($id,Request $request){
        //delete reservation in records
        $reservation = Reservation::find($id);
        $reservationDelete = $reservation->delete();      

        //how to update the timeslots status to become 0
        return redirect()->route('my.appointment')->with('message', 'Appointment has been cancelled successfully');

    }


}
