@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Services</h5>
                    <span>Update Service</span>
                </div>
            </div>
        </div>

    <div class="col-lg-4">
        <nav class="breadcrumb-container" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <i class="ik ik-home"></i>
                </li>
                <li class="breadcrumb-item">Service</li>
                <li class="breadcrumb-item active" aria-current="page">Update</li>
            </ol>
        </nav>
    </div>
    </div>
</div>

<div class="row justify-content-center">
	<div class="col-lg-10">

	<div class="card">
	<div class="card-header"><h3>Add service</h3></div>
	<div class="card-body">
		<form class="forms-sample" action="{{route('service.update',[$service->id])}}" method="post">@csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group"></div>
                    <label for="">Type of service</label>
                    <input type="text" name="service" class="form-control @error('service') is-invalid @enderror" placeholder="service" value="{{$service->service}}">
                    @error('service')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                    @enderror
                    <br>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
		            </div>
                </div>
            </div>
        </form>
	</div>
	</div>
    </div>
</div>


@endsection