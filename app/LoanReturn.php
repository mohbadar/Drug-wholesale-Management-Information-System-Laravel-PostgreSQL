<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanReturn extends Model
{
	    //customer
    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }
}
