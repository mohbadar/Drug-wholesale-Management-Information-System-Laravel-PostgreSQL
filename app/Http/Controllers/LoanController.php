<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
use App\Loan;


class LoanController extends Controller
{
    //create
    public function create()
    {
    	$customers = Customer::orderBy('created_at', 'DESC')->get();
    	return view('cms.loan.loan', compact('customers'));
    }


    //save
    public function save(Request $request)
    {
    	$this->validate($request, [
    		'customer'  => 'required',
    		'date'      => 'required',
    		'amount'    => 'required'
    		]);
    	// dd(decrypt($request->customer));
    	$loan = new Loan;
    	$loan->customer_id = decrypt($request->customer);
    	$loan->date = $request->date;
    	$loan->amount = $request->amount;
    	$loan->remark = $request->remark;

    	$loan->save();

    	return back()->with('successMsg' , 'موفقانه ثبت سیستم شد.');

    }

    //update
    public function update($id)
    {
    	$loan = Loan::findOrFail(decrypt($id));
    	$update = true;
    	$customers = Customer::all();
    	return view('cms.loan.loan', compact('update', 'loan', 'customers'));

    }

    //delete
    public function delete($id)
    {
    	$loan = Loan::findOrFail(decrypt($id));
    	$loan->delete();

    	return back()->with('successMsg', 'موفقانه از سیستم حذف گردید!');
    }

    //edit
    public function edit(Request $request)
    {
    	   $this->validate($request, [
    		'customer'  => 'required',
    		'date'      => 'required',
    		'amount'    => 'required'
    		]);

    	$loan = Loan::findOrFail(decrypt($request->loan_id));
    	$loan->customer_id = decrypt($request->customer);
    	$loan->date = $request->date;
    	$loan->amount = $request->amount;
    	$loan->remark = $request->remark;

    	$loan->save();

    	return back()->with('successMsg' , 'موفقانه تصحیح شد.');
    }


    //list
    public function list()
    {
    	$loans = Loan::orderBy('created_at', 'ASC')->paginate();
    	$list = true;

    	return view('cms.loan.loan', compact('list', 'loans'));
    }
}
