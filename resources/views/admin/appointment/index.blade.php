@extends('admin.layouts.master')
@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
           

            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Dentists</h5>
                    <span>appointment time</span>
                    
                </div>
            </div>
        </div>
    <div class="col-lg-4">
        <nav class="breadcrumb-container" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <i class="ik ik-home"></i>
                </li>
                <li class="breadcrumb-item">Dentist</li>
                <li class="breadcrumb-item active" aria-current="page">Appointment</li>
            </ol>
        </nav>
    </div>
    </div>
</div>

<div class="container">
         @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
        @if(Session::has('errmessage'))
        <div class="alert bg-danger alert-success text-white" role="alert">
            {{Session::get('errmessage')}}
        </div>
        @endif
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
                
            </div>
                
        @endforeach
    
        
    <form action="{{route('appointment.check')}}" method="post">@csrf
 
    <div class="card">
        <div class="card-header">
            Choose date
            <br>
            @if(isset($date))
              Your timetable for:
              {{$date}}
            @endif

        </div>
        <div class="card-body">
         <input type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="date">
        <br>
        <button type="submit" class="btn btn-primary">check</button>
        </div>
    </div>

    </form>
  @if(Route::is('appointment.check'))
    <form action="{{route('update')}}" method="post">@csrf
    <div class="card">
        <div class="card-header">
            Choose a.m. time
           <span style="margin-left: 600px">Check/Uncheck
               <input type="checkbox" onclick=" for(c in document.getElementsByName('time[]')) document.getElementsByName('time[]').item(c).checked=this.checked" >
           </span>
        </div>
        <div class="card-body">
            
            <table class="table table-striped">
             
               
              <tbody>
                <input type="hidden" name="appoinmentId" value="{{$appointmentId}}">
                <tr>
                  <th scope="row">1</th>
                  <td><input type="checkbox" name="time[]"  value="8.00am" @if(isset($timeslots)){{ $timeslots->contains('time','8.00am')?'checked':'' }}@endif>8.00a.m.</td>
                  <td><input type="checkbox" name="time[]"  value="8.30am" @if(isset($timeslots)){{ $timeslots->contains('time','8.30am')?'checked':'' }}@endif>8.30a.m.</td>
                </tr>

                <tr>
                  <th scope="row">2</th>
                  <td><input type="checkbox" name="time[]"  value="9.00am" @if(isset($timeslots)){{ $timeslots->contains('time','9.00am')?'checked':'' }}@endif>9.00a.m.</td>
                  <td><input type="checkbox" name="time[]"  value="9.30am" @if(isset($timeslots)){{ $timeslots->contains('time','9.30am')?'checked':'' }}@endif> 9.30a.m.</td>
                </tr>

                <tr>
                  <th scope="row">3</th>
                  <td><input type="checkbox" name="time[]"  value="10.00am" @if(isset($timeslots)){{ $timeslots->contains('time','10.00am')?'checked':'' }}@endif>10.00a.m.</td>
                  <td><input type="checkbox" name="time[]"  value="10.30am" @if(isset($timeslots)){{ $timeslots->contains('time','10.30am')?'checked':'' }}@endif>10.30a.m.</td>
                </tr>

                <tr>
                  <th scope="row">4</th>
                  <td><input type="checkbox" name="time[]"  value="11.00am" @if(isset($timeslots)){{ $timeslots->contains('time','11.00am')?'checked':'' }}@endif>11.00a.m.</td>
                  <td><input type="checkbox" name="time[]"  value="11.30am" @if(isset($timeslots)){{ $timeslots->contains('time','11.30am')?'checked':'' }}@endif>11.30a.m.</td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>

        <div class="card">
        <div class="card-header">
            Choose p.m. time
        </div>
        <div class="card-body">
            
            <table class="table table-striped">
             
               
              <tbody>
                <tr>
                  <th scope="row">5</th>
                  <td><input type="checkbox" name="time[]"  value="12.00pm" @if(isset($timeslots)){{ $timeslots->contains('time','12.00pm')?'checked':'' }}@endif>12.00p.m.</td>
                  <td><input type="checkbox" name="time[]"  value="12.30pm" @if(isset($timeslots)){{ $timeslots->contains('time','12.30pm')?'checked':'' }}@endif>12.30p.m.</td>
                </tr>

                <tr>
                  <th scope="row">6</th>
                  <td><input type="checkbox" name="time[]"  value="1.00pm" @if(isset($timeslots)){{$timeslots->contains('time','1.00pm')?'checked':'' }}@endif>1.00p.m.</td>
                  <td><input type="checkbox" name="time[]"  value="1.30pm" @if(isset($timeslots)){{$timeslots->contains('time','1.30pm')?'checked':'' }}@endif>1.30p.m.</td>
                </tr>

                <tr>
                  <th scope="row">7</th>
                  <td><input type="checkbox" name="time[]"  value="2.00pm" @if(isset($timeslots)){{ $timeslots->contains('time','2.00pm')?'checked':'' }}@endif>2.00p.m.</td>
                  <td><input type="checkbox" name="time[]"  value="2.30pm" @if(isset($timeslots)){{ $timeslots->contains('time','2.30pm')?'checked':'' }}@endif>2.30p.m.</td>
                </tr>

                <tr>
                  <th scope="row">8</th>
                  <td><input type="checkbox" name="time[]"  value="3.00pm" @if(isset($timeslots)){{ $timeslots->contains('time','3.00pm')?'checked':'' }}@endif>3.00p.m.</td>
                  <td><input type="checkbox" name="time[]"  value="3.30pm" @if(isset($timeslots)){{ $timeslots->contains('time','3.30pm')?'checked':'' }}@endif>3.30p.m.</td>
                </tr>

                <tr>
                  <th scope="row">9</th>
                  <td><input type="checkbox" name="time[]"  value="4.00pm" @if(isset($timeslots)){{ $timeslots->contains('time','4.00pm')?'checked':'' }}@endif>4.00p.m.</td>
                  <td><input type="checkbox" name="time[]"  value="4.30pm" @if(isset($timeslots)){{ $timeslots->contains('time','4.30pm')?'checked':'' }}@endif>4.30p.m.</td>
                </tr>

                <tr>
                  <th scope="row">10</th>
                  <td><input type="checkbox" name="time[]"  value="5.00pm" @if(isset($timeslots)){{ $timeslots->contains('time','5.00pm')?'checked':'' }}@endif>5.00p.m.</td>
                  <td><input type="checkbox" name="time[]"  value="5.30pm" @if(isset($timeslots)){{ $timeslots->contains('time','5.30pm')?'checked':'' }}@endif>5.30p.m.</td>
                </tr>

                <tr>
                  <th scope="row">11</th>
                  <td><input type="checkbox" name="time[]"  value="6.00pm" @if(isset($timeslots)){{ $timeslots->contains('time','6.00pm')?'checked':'' }}@endif>6.00p.m.</td>
                  <td><input type="checkbox" name="time[]"  value="6.30pm" @if(isset($timeslots)){{ $timeslots->contains('time','6.30pm')?'checked':'' }}@endif>6.30p.m.</td>
                </tr>

                <tr>
                  <th scope="row">12</th>
                  <td><input type="checkbox" name="time[]"  value="7.00pm" @if(isset($timeslots)){{ $timeslots->contains('time','7.00pm')?'checked':'' }}@endif>7.00p.m.</td>
                  <td><input type="checkbox" name="time[]"  value="7.30pm" @if(isset($timeslots)){{ $timeslots->contains('time','7.30pm')?'checked':'' }}@endif>7.30p.m.</td>
                </tr>

                <tr>
                  <th scope="row">13</th>
                  <td><input type="checkbox" name="time[]"  value="8.00pm" @if(isset($timeslots)){{ $timeslots->contains('time','8.00pm')?'checked':'' }}@endif>8.00p.m.</td>
                  <td><input type="checkbox" name="time[]"  value="8.30pm" @if(isset($timeslots)){{ $timeslots->contains('time','8.30pm')?'checked':'' }}@endif>8.30p.m.</td>
                </tr>

              </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</div>
</form>

@else 
<h3>List of your appoinment time: {{$appointmentsCreated->count()}}</h3>

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Creator</th>
              <th scope="col">Date</th>
              <th scope="col">View/Update</th>
            </tr>
          </thead>
          <tbody>

            @foreach($appointmentsCreated as $appoinment)
            <tr>
            
              <th scope="row"></th>
              <td>{{$appoinment->dentist->name}}</td>
              <td>{{$appoinment->date}}</td>
              <td>
                    <form action="{{route('appointment.check')}}" method="post">@csrf
                        <input type="hidden" name="date" value="{{$appoinment->date}}">
                    <button type="submit" class="btn btn-primary">View/Update</button>


                    </form>


              </td>
            </tr>
            @endforeach
          </tbody>
        </table>



@endif

<style type="text/css">
    input[type="checkbox"]{
        zoom:1.1;
   
    }
    body{
        font-size: 18px;
    }
</style>



@endsection