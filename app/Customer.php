<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //has many loan
    public function loans()
    {
    	return $this->hasMany('App\Loan');
    }

    //has many loan return 
    public function returns()
    {
    	return $this->hasMany('App\LoanReturn');
    }


        // sum of loans for a customer
    public function sumLoan($customer_id)
    {
    	$loans = Loan::where('customer_id', $customer_id)->get();

    	$sum = 0;

    	foreach ($loans as $loan) {
    		$sum += $loan->amount;
    	}

    	return $sum;
    }


            // sum of loan returns for a customer
    public function sumLoanReturns($customer_id)
    {
    	$loans = LoanReturn::where('customer_id', $customer_id)->get();

    	$sum = 0;

    	foreach ($loans as $loan) {
    		$sum += $loan->amount;
    	}

    	return $sum;
    }
}
