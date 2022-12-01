<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bot',function(){
    return view('halo');
});

Route::get('/home','HomeController@index')->name('home');
Route::get('/newAppointment/{dentistId}/{date}','PageController@show')->name('create.appointment');
Route::get('/dashboard','DashboardController@index')->name('dashboard');
Route::any('/botman', function() {
    app('botman')->listen();
});

Auth::routes();

Route::group(['middleware'=>['auth', 'patient']], function(){
    Route::post('/book/appointment', 'PageController@store')->name('reserve.appointment');
    Route::get('/my-appointment', 'PageController@myAppointments')->name('my.appointment');
    Route::get('/my-appointment-cancel/{id}', 'PageController@cancelBookings')->name('my.appointment.cancel');
    Route::get('/userProfile','ProfileController@index');
    Route::post('/user-Profile','ProfileController@store')->name('profile.store');
    Route::post('/userProfile-pic','ProfileController@profilePic')->name('profile.pic');
    Route::get('/my-prescription','PageController@myPrescription')->name('my.prescription');
    Route::post('/userProfile-dentalpic','ProfileController@dentalPic')->name('dental.pic');
    Route::resource('page','PageController');
    });
    
    
    Route::group(['middleware'=>['auth', 'admin']], function(){
        //resource allows to get all methods
        Route::resource('dentist', 'DentistController');
        Route::resource('admin', 'AdminController');
        Route::resource('patient','PatientController');
        Route::get('/patients','PatientListController@index')->name('patient');
        Route::get('/visitStatus/update/{id}','PatientListController@visitStatus')->name('update.status');
        Route::get('/patients/allAppointments','PatientListController@allTimeAppointments')->name('patients.all');
        Route::get('/patients/today','PatientListController@appointmentToday')->name('patient.today');
        Route::resource('service','ServiceController');
    });
    
    
    Route::group(['middleware'=>['auth', 'dentist']], function(){
        Route::resource('appointment', 'AppointmentController');
        Route::post('/appointment/check','AppointmentController@check')->name('appointment.check');
        Route::post('/appointment/update','AppointmentController@updateTime')->name('update');
        Route::get('patient-today','PrescriptionController@index')->name('prescribe.patientToday');
        Route::post('/prescription','PrescriptionController@store')->name('prescription');
        Route::get('/prescription/{userId}/{date}','PrescriptionController@show')->name('prescription.patientAll');
        Route::get('/prescribed-patients','PrescriptionController@prescribedPatients')->name('prescribed.patients');
        Route::get('/reservation/list','ReservationController@index')->name('reservation.patients');
        Route::get('/reservation/today','ReservationController@Today')->name('reservation.today');
    });
    