@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
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
                              @if($reservation->status==0)
                              <a href="{{route('update.status',[$reservation->id])}}"><button class="btn btn-primary">Pending</button></a>
                              @else 
                              <a href="{{route('update.status',[$reservation->id])}}"><button class="btn btn-success"> Checked</button></a>
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
