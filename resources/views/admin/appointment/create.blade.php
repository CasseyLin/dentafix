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
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
                
            </div>
                
        @endforeach
    
        
    <form action="{{route('appointment.store')}}" method="post">@csrf
 
    <div class="card">
        <div class="card-header">
            Choose date

        </div>
        <div class="card-body">
          <input type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="date">
        </div>
    </div>

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
                <tr>
                  <th scope="row">1</th>
                  <td><input type="checkbox" name="time[]"  value="8.00am">8.00a.m.</td>
                  <td><input type="checkbox" name="time[]"  value="8.30am">8.30a.m.</td>
                </tr>

                <tr>
                  <th scope="row">2</th>
                  <td><input type="checkbox" name="time[]"  value="9.00am">9.00a.m.</td>
                  <td><input type="checkbox" name="time[]"  value="9.30am">9.30a.m.</td>
                </tr>

                <tr>
                  <th scope="row">3</th>
                  <td><input type="checkbox" name="time[]"  value="10.00am">10.00a.m.</td>
                  <td><input type="checkbox" name="time[]"  value="10.30am">10.30a.m.</td>
                </tr>

                <tr>
                  <th scope="row">4</th>
                  <td><input type="checkbox" name="time[]"  value="11.00am">11.00a.m.</td>
                  <td><input type="checkbox" name="time[]"  value="11.30am">11.30a.m.</td>
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
                  <td><input type="checkbox" name="time[]"  value="12.00pm">12.00p.m.</td>
                  <td><input type="checkbox" name="time[]"  value="12.30pm">12.30p.m.</td>
                </tr>

                <tr>
                  <th scope="row">6</th>
                  <td><input type="checkbox" name="time[]"  value="1.00pm">1.00p.m.</td>
                  <td><input type="checkbox" name="time[]"  value="1.30pm">1.30p.m.</td>
                </tr>

                <tr>
                  <th scope="row">7</th>
                  <td><input type="checkbox" name="time[]"  value="2.00pm">2.00p.m.</td>
                  <td><input type="checkbox" name="time[]"  value="2.30pm">2.30p.m.</td>
                </tr>

                <tr>
                  <th scope="row">8</th>
                  <td><input type="checkbox" name="time[]"  value="3.00pm">3.00p.m.</td>
                  <td><input type="checkbox" name="time[]"  value="3.30pm">3.30p.m.</td>
                </tr>

                <tr>
                  <th scope="row">9</th>
                  <td><input type="checkbox" name="time[]"  value="4.00pm">4.00p.m.</td>
                  <td><input type="checkbox" name="time[]"  value="4.30pm">4.30p.m.</td>
                </tr>

                <tr>
                  <th scope="row">10</th>
                  <td><input type="checkbox" name="time[]"  value="5.00pm">5.00p.m.</td>
                  <td><input type="checkbox" name="time[]"  value="5.30pm">5.30p.m.</td>
                </tr>

                <tr>
                  <th scope="row">11</th>
                  <td><input type="checkbox" name="time[]"  value="6.00pm">6.00p.m.</td>
                  <td><input type="checkbox" name="time[]"  value="6.30pm">6.30p.m.</td>
                </tr>

                <tr>
                  <th scope="row">12</th>
                  <td><input type="checkbox" name="time[]"  value="7.00pm">7.00p.m.</td>
                  <td><input type="checkbox" name="time[]"  value="7.30pm">7.30p.m.</td>
                </tr>

                <tr>
                  <th scope="row">13</th>
                  <td><input type="checkbox" name="time[]"  value="8.00pm">8.00p.m.</td>
                  <td><input type="checkbox" name="time[]"  value="8.30pm">8.30p.m.</td>
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
    </form>

</div>

<style type="text/css">
    input[type="checkbox"]{
        zoom:1.1;
   
    }
    body{
        font-size: 18px;
    }
</style>



@endsection