<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    //create
    public function create(){
    	$countries = Category::paginate(2);
    	return view('cms.category.category', compact('countries'));
    }

    // save
    public function save(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|min:3'
    	]);

    	$category = new Category;
    	$category->name= $request->name;
    	$category->save();

    	return back()->with('successMsg', 'کشور موفقانه ثبت سیستم شد.');
    }


    //update
    public function update($id)
    {
    	$category = Category::findOrFail(decrypt($id));
    	$update = true;
    	return view('cms.category.category', compact('update', 'category'));
    }

    //delete 
    public function delete($id)
    {
    	$category = Category::findOrFail(decrypt($id));
    	$category->delete();

    	return back()->with('successMsg', 'موفقانه از سیستم حذف گردید.');
    	
    }

    //edit
    public function edit(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|min:3'
    	]);

    	$category =Category::findOrFail(decrypt($request->category_id));
    	$category->name= $request->name;
    	$category->update();

    	return back()->with('successMsg', 'کشور موفقانه تصحیح شد.');
    }
}
