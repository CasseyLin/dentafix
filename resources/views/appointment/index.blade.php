@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              @if(Session::has('message'))
              <div class="alert alert-success">
                  {{Session::get('message')}}
              </div>
              @endif
                <div class="card-header">Your appointments({{$appointments->count()}})</div>

                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Dentist</th>
                          <th scope="col">Time</th>
                          <th scope="col">Appointment Date</th>
                          <th scope="col">Date & time of <br> making an appointment</th>
                          <th scope="col">Visit Status</th>
                          <th scope="col">Appointment Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($appointments as $key=>$myAppointment)
                        <tr>
                          <th scope="row">{{$key+1}}</th>
                          <td>{{$myAppointment->dentist->name}}</td>
                          <td>{{$myAppointment->time}}</td>
                          <td>{{$myAppointment->date}}</td>
                          <td>{{$myAppointment->created_at}}</td>
                          <td>
                              @if($myAppointment->status==0)
                              <button class="btn btn-primary">Not visited</button>
                              @else 
                              <button class="btn btn-success">Visited</button>
                              @endif
                          </td>
                          <td>
                              @if ($myAppointment->status==0)
                              <form action="{{route('page.destroy',[$myAppointment->id])}}" method="post">@csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Cancel Booking</button>
                              </form>
                              @else
                              Success
                              @endif
                          </td>       
                        </tr>
                        @empty
                        <td>No appointment has been made.</td>
                        @endforelse
                       
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
