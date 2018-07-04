<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Loan;
use App\LoanReturn;
use App\Expense;
use App\Bill;


class ReportController extends Controller
{
    //customers report
    public function customers_report()
    {
    	$customers = Customer::paginate(2);
    	$customers_report = true;

    	return view('cms.report.report', compact('customers', 'customers_report'));
    }

    //expenses report
    public function expenses_report()
    {

    	$expenses = Expense::orderBy('created_at', 'DESC')->paginate(2);
    	$expeses_report = true;

    	return view('cms.report.report',compact('expeses_report', 'expenses'));

    }

    //bills report
    public function bills_report()
    {
    	$bills = Bill::orderBy('created_at', 'DESC')->paginate(2);

    	$bills_report = true;

    	return view('cms.report.report', compact('bills_report', 'bills'));
    }
}
