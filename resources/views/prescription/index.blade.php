@extends('admin.layouts.master')

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
                <div class="card-header">All appointments({{$reservations->count()}})</div>

                 
                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Image</th>
                          <th scope="col">Date</th>
                          <th scope="col">User</th>
                          <th scope="col">Gender</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone number</th>
                          <th scope="col">Time</th>
                          <th scope="col">Dentist</th>
                          <th scope="col">Status</th>
                          <th scope="col">Prescription</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($reservations as $key=>$reservation)
                        <tr>
                          <th scope="row">{{$key+1}}</th>

                          <td><img src="/profile/{{$reservation->user->image}}" width="80"
                          style="border-radius:50%;"></td>
             
                          <td>{{$reservation->date}}</td>
                          <td>{{$reservation->user->name}}</td>
                          <td>{{$reservation->user->gender}}</td>
                          <td>{{$reservation->user->email}}</td>
                          <td>{{$reservation->user->phone_number}}</td>
                          <td>{{$reservation->time}}</td>
                          <td>{{$reservation->dentist->name}}</td>
                          <td>
                            @if($reservation->status==1)
                            Visited
                            @endif                         
                          </td>
                          <td>
                      @if(!App\Prescription::where('date',date('Y-m-d'))->where
                      ('dentist_id',auth()->user()->id)->where('user_id',$reservation->user->id)->exists())
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Write Prescription</button>
                            @include('prescription.prescribe')

                            @else
                            <a href="{{route('prescription.patientAll',[$reservation->user_id,$reservation->date])}}" 
                              class="btn btn-secondary">View Prescription</a>
                            @endif

                          </td>
                        </tr>
                        @empty
                        <td>No appointment has been made on this day.</td>
                        @endforelse
                       
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
