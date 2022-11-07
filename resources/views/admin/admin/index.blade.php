@extends('admin.layouts.master')

@section('content')

<div class="page-header">
<div class="row align-items-end">
    <div class="col-lg-8">
        <div class="page-header-title">
            <i class="ik ik-inbox bg-blue"></i>
            <div class="d-inline">
                <h5>Admins</h5>
                <span>list of all admins</span>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <nav class="breadcrumb-container" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <i class="ik ik-home"></i>
                </li>
                <li class="breadcrumb-item">Admins</li>
                <li class="breadcrumb-item active" aria-current="page">Index</li>
            </ol>
        </nav>
    </div>
</div>
</div>


<div class="row">
<div class="col-md-12">
       @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
    <div class="card">
        <div class="card-header"><h3>DentaFix Admins</h3>

        </div>
        <div class="card-body">
            <table id="data_table" class="table">
                <thead>
                    <tr>
                        <th>Admin Name</th>
                        <th class="nosort">Profile Picture</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone number</th>
                        <th class="nosort">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($users)>0)
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td><img src="{{asset('Images')}}/{{$user->image}}" class="table-user-thumb" alt=""></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->phone_number}}</td>
                        <td>
                            <div class="table-actions">
                                <a href="#" data-toggle="modal" data-target="#exampleModal{{$user->id}}">
                                <i class="ik ik-eye"></i>
                                </a>
                                <a href="{{route('admin.edit',[$user->id])}}"><i class="ik ik-edit-2"></i></a>
                                
                                <a href="{{route('admin.show',[$user->id])}}">
                                    <i class="ik ik-trash-2"></i>
                                </a>

                            </div>
                        </td>

                    </tr>
           
                    <!-- View Modal -->
                    @include('admin.admin.model')



                    @endforeach
                   
                    @else 
                    <td>No user to display</td>
                    @endif
                
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection