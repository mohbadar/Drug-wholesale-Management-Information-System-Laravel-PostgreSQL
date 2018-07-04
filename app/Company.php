<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //belongs to country
    public function country()
    {
    	return $this->belongsTo('App\Country');
    }
}
