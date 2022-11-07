@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">My Prescriptions</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>

                            <th scope="col">Date</th>
                            <th scope="col">Dentist</th>
                            <th scope="col">Service</th>
                            <th scope="col">Medicine</th>
                            <th scope="col">Instructions to use the medicine(s)</th>
                            <th scope="col">Note</th>

                          </tr>
                        </thead>
                        <tbody>
                          @forelse($prescriptions as $prescription)
                          <tr>
                            <td>{{$prescription->date}}</td>
                            <td>{{$prescription->dentist->name}}</td>
                            <td>{{$prescription->name_of_service}}</td>
                            <td>{{$prescription->medicine}}</td>
                            <td>{{$prescription->instructions_to_use}}</td>
                            <td>{{$prescription->note}}</td>
                          </tr>
                          @empty
                          <td>You have no prescription</td>
                          @endforelse
                        </tbody>
                      </table>

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