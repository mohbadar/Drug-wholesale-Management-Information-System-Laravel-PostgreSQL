<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    //country
    public function country()
    {
    	return $this->belongsTo('App\Country');
    }

    //category
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    //company
    public function company()
    {
    	return $this->belongsTo('App\Company');
    }
}
