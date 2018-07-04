<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
use App\Loan;
use App\LoanReturn;

class CustomerController extends Controller
{
    //create 
    public function create()
    {
    	return view('cms.customer.customer');
    }


    //save 
    public function save(Request $request)
    {
    	$this->validate($request, [
    		'firstname' => 'required',
    		'lastname'  => 'required',
    		'email'     => 'email',
    		'file'      => 'image'
    	]);

    	// dd($request);

    	$customer = new Customer;
    	$customer->firstname =$request->firstname;
    	$customer->lastname = $request->lastname;
    	$customer->email = $request->email;
    	$customer->phone = $request->email;
    	$customer->remark = $request->remark;

    	$file = $request->file('file');

    	//dd($file);
	    if ($file) {
	      	$fileExtension = $file->getClientOriginalExtension();
	        $dbPath = "/files/customers/".time().'.'.$fileExtension;
	        $file->move(public_path("/files/customers/"), $dbPath);
	        $customer->photo= $dbPath;
	    }

	    $customer->save();

	    return back()->with('successMsg', 'معلومات مشتری ثبت سیستم شد.');
     }

     //list 
     public function list()
     {
     	$customers = Customer::orderBy('created_at', 'DESC')->paginate(2);
     	$list = true;

     	return view('cms.customer.customer', compact('list', 'customers'));
     }

     //update
     public function update($id)
     {
     	$update =true;
     	$customer = Customer::findOrFail(decrypt($id));

     	return view('cms.customer.customer', compact('update', 'customer'));
     }

     //delete 
     public function delete($id)
     {
     	$customer = Customer::findOrFail(decrypt($id));
     	$customer->delete();

     	return back()->with('successMsg', 'مشتری از سیستم حذف شد');
     }


     //edit
     public function edit(Request $request)
     {

     	 $this->validate($request, [
    		'firstname' => 'required',
    		'lastname'  => 'required',
    		'email'     => 'email',
    		'file'      => 'image'
    	]);

    	// dd($request);

    	$customer = Customer::findOrFail(decrypt($request->customer_id));
    	$customer->firstname =$request->firstname;
    	$customer->lastname = $request->lastname;
    	$customer->email = $request->email;
    	$customer->phone = $request->email;
    	$customer->remark = $request->remark;

    	$file = $request->file('file');

    	//dd($file);
	    if ($file) {
	      	$fileExtension = $file->getClientOriginalExtension();
	        $dbPath = "/files/customers/".time().'.'.$fileExtension;
	        $file->move(public_path("/files/customers/"), $dbPath);
	        $customer->photo= $dbPath;
	    }

	    $customer->update();

	    return back()->with('successMsg', 'معلومات مشتری تصحیح سیستم شد.');

     }

     //search
     public function search(Request $request)
     {
        $customers = Customer::where('firstname', 'LIKE', '%'.$request->firstname.'%')->paginate(2);
        $list = true;

        return view('cms.customer.customer', compact('list', 'customers'));
     }

     //report
     public function report($id)
     {
        $customer = Customer::findOrFail(decrypt($id));
        $loans = Loan::orderBy('created_at', 'ASC')->where('customer_id', decrypt($id))->get();
        $returns = LoanReturn::orderBy('created_at', 'ASC')->where('customer_id', decrypt($id))->get();

        return view('cms.customer.report', compact('loans', 'returns', 'customer'));
     }
}
