@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Welcome!
                    You are logged in as
                    {{Auth()->user()->name}}

                </div>
            </div>
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
