<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
{
    //create
    public function create(){
    	$countries = Country::paginate(2);
    	return view('cms.country.country', compact('countries'));
    }

    // save
    public function save(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|min:3'
    	]);

    	$country = new Country;
    	$country->name= $request->name;
    	$country->save();

    	return back()->with('successMsg', 'کشور موفقانه ثبت سیستم شد.');
    }


    //update
    public function update($id)
    {
    	$country = Country::findOrFail(decrypt($id));
    	$update = true;
    	return view('cms.country.country', compact('update', 'country'));
    }

    //delete 
    public function delete($id)
    {
    	$country = Country::findOrFail(decrypt($id));
    	$country->delete();

    	return back()->with('successMsg', 'موفقانه از سیستم حذف گردید.');
    	
    }

    //edit
    public function edit(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|min:3'
    	]);

    	$country =Country::findOrFail(decrypt($request->country_id));
    	$country->name= $request->name;
    	$country->update();

    	return back()->with('successMsg', 'کشور موفقانه تصحیح شد.');
    }
}
