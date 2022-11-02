<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Timeslot;

class Appointment extends Model
{
    protected $guarded = [];

	public function dentist(){
		return $this->belongsTo(User::class,'user_id','id');
	}
	public function times(){
    	return $this->hasMany(Timeslot::class);
    }

}
