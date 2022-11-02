<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Reservation extends Model
{
    protected $guarded =[];

    public function dentist()
    {     
        return $this->belongsTo(User::class);
    }

    public function user()
    { 
        return $this->belongsTo(User::class);
    }

}
