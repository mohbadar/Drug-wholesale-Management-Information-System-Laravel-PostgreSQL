<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //customer
    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }


    //get price of bill
    public function getValue($bill_id)
    {
    	$details = BillDetails::where('bill_id' , $bill_id)->get();

    	$value = 0;

    	foreach ($details as $detail) {
    		$value += ($detail->price* $detail->quantity);
    	}

    	return $value;
    }
}
