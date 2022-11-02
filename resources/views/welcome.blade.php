@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="/main/dentafix.jpg" class="img-fluid" style="border:1px solid #ccc;">
        </div>
        <div class="col-md-6">
            <h2>Create an account & Book your appointment</h2>
            <p> In DentaFix, we provide excellent quality services with affordable prices. Begin your day with a smile!. </p>
            <div class="mt-5">
               <a href="{{url('/register')}}"> <button class="btn btn-success">Register</button></a>
                <a href="{{url('/login')}}"><button class="btn btn-secondary">Login</button></a>
            </div>
        </div>
    </div>
    <hr>

    <!--date picker component-->
    <find-dentist></find-dentist>
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
    
