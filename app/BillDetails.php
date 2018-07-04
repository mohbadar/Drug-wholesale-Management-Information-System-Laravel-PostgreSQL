<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetails extends Model
{
    //bill
    public function bill()
    {
    	return $this->belongsTo('App\Bill');
    }

    //drug
    public function drug()
    {
    	return $this->belongsTo('App\Drug');
    }

    //multiply
    public function multiply($quantiy , $price)
    {
    	return $quantiy*$price;
    }
}
