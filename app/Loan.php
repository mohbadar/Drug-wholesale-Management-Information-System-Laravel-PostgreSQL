<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    //customer
    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }



}
