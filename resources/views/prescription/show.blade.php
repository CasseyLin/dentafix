@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                </div>

                <div class="card-body">
                    <p><strong>Date:</strong> {{$prescription->date}}</p>
                    <p><strong>Patient Name:</strong> {{$prescription->user->name}}</p>
                    <p><strong>Dentist Name:</strong> {{$prescription->dentist->name}}</p>
                    <label>*********************************************</label>
                    <p><strong>Name of Service:</strong> {{$prescription->name_of_service}}</p>
                    <label>*********************************************</label>
                    <p><strong>Medicine:</strong><br> {{$prescription->medicine}}</p>
                    <p><strong>Instructions to use the medicine:</strong><br> {{$prescription->instructions_to_use}}</p>
                    <p><strong>Note:</strong><br> {{$prescription->note}}</p>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
