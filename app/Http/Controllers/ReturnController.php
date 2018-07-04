<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\LoanReturn;

class ReturnController extends Controller
{
     //create
    public function create()
    {
    	$customers = Customer::orderBy('created_at', 'DESC')->get();
    	return view('cms.return.return', compact('customers'));
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
    	$loan = new LoanReturn;
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
    	$return = LoanReturn::findOrFail(decrypt($id));
    	$update = true;
    	$customers = Customer::all();
    	return view('cms.return.return', compact('update', 'return', 'customers'));

    }

    //delete
    public function delete($id)
    {
    	$loan = LoanReturn::findOrFail(decrypt($id));
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

    	$loan = LoanReturn::findOrFail(decrypt($request->return_id));
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
    	$returns = LoanReturn::orderBy('created_at', 'ASC')->paginate();
    	$list = true;

    	return view('cms.return.return', compact('list', 'returns'));
    }
}
