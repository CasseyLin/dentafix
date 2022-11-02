@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success">
        {{ Session::get('message') }}</div>
    @endif
    <div class="row">

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">User Profile</div>
                <div class="card-body">
                    <p>Name:<br>{{ auth()->user()->name }}<br></p>
                    <p>Gender:<br>{{ auth()->user()->gender }}<br></p>
                    <p>Email:<br>{{ auth()->user()->email}}<br></p>
                    <p>Phone number:<br>{{ auth()->user()->phone_number }}<br></p>
                    <p>Address:<br>{{ auth()->user()->address }}<br></p>
                    <p>Bio:<br>{{ auth()->user()->description }}<br><br></p>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Profile Information</div>
                <div class="card-body">
                    <form action="{{route('profile.store')}}" method="post">@csrf

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ 
                            auth()->user()->name }}">
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control
                            @error('gender') is-invalid @enderror">
                                <option value="">select gender</option></option>
                                <option value="male" @if(auth()->
                                user()->gender==='male')selected @endif>Male</option>
                                <option value="female" @if(auth()->
                                user()->gender==='female')selected @endif>Female</option>
                            </select>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="{{ 
                            auth()->user()->email }}">
                        </div>

                        <div class="form-group">
                            <label>Phone number</label>
                            <input type="text" name="phone_number" class="form-control" value="{{
                            auth()->user()->phone_number }}">
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control">{{ 
                            auth()->user()->address }}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label>Bio</label>
                            <textarea name="description" class="form-control">{{
                            auth()->user()->description }}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">User Image</div>
                <form action="{{ route('profile.pic') }}" method="post"
                enctype="multipart/form-data">@csrf
                <div class="card-body">
                    @if(!auth()->user()->image)
                    <img src="/Images/user.png" width="100">
                    @else
                    <img src="/profile/{{auth()->user()->image}}" width="100">
                    @endif
                    <br>
                    <input type="file" name="file" class="form-control" required="">
                    <br>
                    @error('file')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
