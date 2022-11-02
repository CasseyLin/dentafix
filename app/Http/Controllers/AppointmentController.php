<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Timeslot;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointmentsCreated = Appointment::latest()->where('user_id',auth()->user()->id)->get();
        return view('admin.appointment.index',compact('appointmentsCreated'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.appointment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'date'=>'required|unique:appointments,date,NULL,id,user_id,'.\Auth::id(),
            'time'=>'required'
        ]);
        $appointment = Appointment::create([
            'user_id'=> auth()->user()->id,
            'date' => $request->date
        ]);
        foreach($request->time as $time){
            Timeslot::create([
                'appointment_id'=> $appointment->id,
                'time'=> $time,

            ]);
        }
        return redirect()->back()->with('message','Appointment created for '. $request->date);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function check(Request $request){

        $date = $request->date;
        $appointment= Appointment::where('date',$date)->where('user_id',auth()->user()->id)->first();
        if(!$appointment){
            return redirect()->to('/appointment')->with('errmessage','Appointment time is not available for this date');
        }
        $appointmentId = $appointment->id;
        $timeslots = Timeslot::where('appointment_id',$appointmentId)->get();
        return view('admin.appointment.index',compact('timeslots','appointmentId','date'));
    }

    public function updateTime(Request $request){
        $appointmentId = $request->appoinmentId; 
        $appointment = Timeslot::where('appointment_id',$appointmentId)->where('status',0)->delete();


        foreach((array)$request->time as $time){
            Timeslot::create([
                'appointment_id'=>$appointmentId,
                'time'=>$time,
                'status'=>0
            ]);
        }
        return redirect()->route('appointment.index')
        ->with('message','Appointment time has been updated!')
        ->with('errmessage','Timeslots which have been booked by the users are not allowed to be deleted!
        Please check carefully!');
    }



}
