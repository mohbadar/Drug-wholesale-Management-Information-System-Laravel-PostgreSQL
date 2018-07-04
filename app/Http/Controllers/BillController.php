<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Auth;
use App\BillDetails;
use App\Category;
use App\Country;
use App\Bill;


class BillController extends Controller
{
	    //create
    public function create()
    {
    	$customers = Customer::orderBy('created_at', 'DESC')->get();
    	return view('cms.bill.bill', compact('customers'));
    }


    //save
    public function save(Request $request)
    {
    	// dd($request);
    	$this->validate($request, [
    		'customer'  => 'required',
    		'date'    => 'required'
    		]);
    	// dd(decrypt($request->customer));
    	$bill = new Bill;
    	$bill->customer_id = decrypt($request->customer);
    	$bill->user_id = Auth::user()->id;
    	$bill->date = $request->date;
    	$bill->remark = $request->remark;

    	$bill->save();

    	return back()->with('successMsg' , 'موفقانه ثبت سیستم شد.');

    }

    //update
    public function update($id)
    {
    	$bill = Bill::findOrFail(decrypt($id));
    	$update = true;
    	$customers = Customer::all();
    	return view('cms.bill.bill', compact('update', 'bill', 'customers'));

    }

    //delete
    public function delete($id)
    {
    	$bill = Bill::findOrFail(decrypt($id));
    	$bill->delete();

    	return back()->with('successMsg', 'موفقانه از سیستم حذف گردید!');
    }

    //edit
    public function edit(Request $request)
    {
    	   $this->validate($request, [
    		'customer'  => 'required',
    		'date'      => 'required',
    		]);

    	$bill = Bill::findOrFail(decrypt($request->bill_id));
    	$bill->customer_id = decrypt($request->customer);
    	$bill->date = $request->date;
    	$bill->user_id = Auth::user()->id;
    	$bill->remark = $request->remark;

    	$bill->update();

    	return back()->with('successMsg' , 'موفقانه تصحیح شد.');
    }


    //list
    public function list()
    {
    	$bills = Bill::orderBy('created_at', 'ASC')->paginate();
    	$list = true;

    	return view('cms.bill.bill', compact('list', 'bills'));
    }

    //bill items
    public function bill_items($id)
    {
    	$countries = Country::all();
    	$categories = Category::all();
    	$items = BillDetails::where('bill_id', decrypt($id))->get();
    	return view('cms.bill.bill_details',compact('items','id', 'countries', 'categories'));
    }


    //register item
    public function register_item(Request $request)
    {
    	// dd(decrypt($request->bill_id));
    	$this->validate($request, [
    		'quantity' => 'required',
    		'price'   => 'required',
    		'drug'    => 'required',
    		'category' => 'required'
    		]);

    	$item = new BillDetails;
    	$item->quantity = $request->quantity;
    	$item->price = $request->price;
    	$item->drug_id =$request->drug;
    	$item->bill_id = decrypt($request->bill_id);
    	$item->save();

    	return back()->with('successMsg', 'موفقانه ثبت سیستم شد.');
    }

    //delete item
    public function delete_item($id)
    {
    	$item = BillDetails::findOrFail(decrypt($id));
    	$item->delete();

    	return back()->with('successMsg', 'حذف شد.');	
    }
}
