@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Dentist Information</h4>
                    <img src="{{asset('dentists')}}/{{$user->image}}" width="100px" style="border-radius: 50%";>
                    <br>
                    <br>
                    <p class="lead"> Name:{{ucfirst($user->name)}}</p>
                    <p class="lead"> Education:{{$user->education}}</p>
                    <p class="lead"> Service:{{$user->service}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error }}</div>
            @endforeach

            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif

            @if(Session::has('errmessage'))
                <div class="alert alert-success">
                    {{Session::get('errmessage')}}
                </div>
            @endif

            <form action="{{route('reserve.appointment')}}" method="post">@csrf
            <div class="card">
                <div class="card-header lead">{{$date}}</div>
                <div class="card-body">
                    <div class="row">
                        @foreach($timeslots as $time)
                        <div class="col-md-3">
                            <label class="btn btn-outline-primary">
                                <input type="radio" name="time" value="{{$time->time}}">
                                <span>{{$time->time}}</span>
                            </label>
                        </div>
                        <input type="hidden" name="dentistId" value="{{$dentist_id}}">
                        <input type="hidden" name="appointmentId" value="{{$time->appointment_id}}">
                        <input type="hidden" name="date" value="{{$date}}">
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card-footer">
                @if(Auth::check())
                <button type="submit" class="btn btn-success" style="width: 100%">
                Book Appointment</button>
                @else
                <p>Please login to book your appointment</p>
                <a href="/register">Register now!</a>
                <br>
                <a href="/login">Login</a>
                @endif
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

<script>
    var botmanWidget = {
        aboutText: 'Developed with❤️ by Cassey',
        introMessage: "✋ Hi! I am Cassey, your assistant chatbot from DentaFix~",
        title:"DentaFix Chatbot",
        placeholderText: 'Ask Cassey Something...',
        bubbleBackground: '#FFFFFF',
        mainColor:'#80E2FF',
        aboutText:'Developed with ❤️ by Cassey',
        aboutLink:'https://drive.google.com/file/d/1Pc8pRFxdSyBHazol4EZkqf_WS0raKh1g/view?usp=sharing',
        bubbleAvatarUrl:'/chatbot/chatbot.jpg'
    };
  </script>
  
  <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>