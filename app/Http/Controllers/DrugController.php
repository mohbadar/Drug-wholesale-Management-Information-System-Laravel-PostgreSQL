<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Country;
use App\Drug;

class DrugController extends Controller
{
    //create
    public function create()
    {
    	$categories = Category::all();
    	$countries = Country::all();

    	return view('cms.drug.drug', compact('categories', 'countries'));
    }

    //save
    public function save(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'name'  => 'required',
            'category' => 'required',
            ]);

        $drug  = new Drug;
        $drug->name = $request->name;
        $drug->made_date = $request->made_date;
        $drug->expire_date = $request->expire_date;
        $drug->category_id = decrypt($request->category);
        $drug->country_id= decrypt($request->country);
        $drug->company_id = $request->company;
        $drug->remark =$request->remark;

        $drug->save();

        return back()->with('successMsg', 'موفقانه ثبت سیستم گردید.');


    }

    //delete
    public function delete($id)
    {
        $drug = Drug::findOrFail(decrypt($id));
        $drug->delete();

        return back()->with('successMsg', "موفقانه حذف گردید.");
    }

    //update
    public function update($id)
    {
        $drug = Drug::findOrFail(decrypt($id));
        $update = true;
        $categories = Category::all();
        $countries = Country::all();

        return view('cms.drug.drug', compact('update', 'drug', 'categories', 'countries'));
    }

    //edit
    public function edit(Request $request)
    {
                // dd($request);
        $this->validate($request, [
            'name'  => 'required',
            'category' => 'required',
            ]);

        $drug  = Drug::findOrFail(decrypt($request->drug_id));
        $drug->name = $request->name;
        $drug->made_date = $request->made_date;
        $drug->expire_date = $request->expire_date;
        $drug->category_id = decrypt($request->category);
        $drug->country_id= decrypt($request->country);
        $drug->company_id = $request->company;
        $drug->remark =$request->remark;

        $drug->update();

        return back()->with('successMsg', 'موفقانه تصحیح سیستم گردید.');
    }

    //list
    public function list()
    {
        $list = true;
        $drugs = Drug::orderBy('expire_date', 'DESC')->paginate(2);
        return view('cms.drug.drug', compact('list', 'drugs'));
    }

    //search 
    public function search(Request $request)
    {
        $name = $request->keyword;
        $drugs = Drug::orderBy('expire_date','DESC')->where('name', 'LIKE', '%'.$name. '%')->paginate(2);
        $list= true;

        return view('cms.drug.drug', compact('drugs', 'list'));

    }

    //based on expire date
    public function list_expire_date()
    {
        $drugs = Drug::orderBy('expire_date', 'DESC')->paginate(2);
        $list = true;

        return view('cms.drug.drug', compact('list', 'drugs'));
    }

    
}
