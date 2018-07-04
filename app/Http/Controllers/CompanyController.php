<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Country;

class CompanyController extends Controller
{
    //

        //create
    public function create(){
    	$companies = Company::paginate(2);
    	// dd($companies);
    	$countries = Country::all();
    	return view('cms.company.company', compact('companies', 'countries'));
    }

    // save
    public function save(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|min:3',
    		'country' => 'required'
    	]);

    	$company = new Company;
    	$company->country_id = decrypt($request->country);
     	$company->name= $request->name;
    	$company->save();

    	return back()->with('successMsg', 'شرکت موفقانه ثبت سیستم شد.');
    }


    //update
    public function update($id)
    {
    	$company = Company::findOrFail(decrypt($id));
    	$update = true;
    	$countries = Country::all();
    	return view('cms.company.company', compact('update', 'company', 'countries'));
    }

    //delete 
    public function delete($id)
    {
    	$company = Company::findOrFail(decrypt($id));
    	$company->delete();

    	return back()->with('successMsg', 'موفقانه از سیستم حذف گردید.');
    	
    }

    //edit
    public function edit(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|min:3'
    	]);

    	$company =Company::findOrFail(decrypt($request->company_id));
    	$company->country_id = decrypt($request->country);
     	$company->name= $request->name;
    	$company->update();


    	return back()->with('successMsg', 'شرکت موفقانه تصحیح شد.');
    }
}
