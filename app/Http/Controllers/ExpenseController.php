<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use Auth;

class ExpenseController extends Controller
{
    //create
    public function create()
    {
    	return view('cms.expense.expense');
    }

    //save
    public function save(Request $request)
    {
    	$this->validate($request, [
    		'issue' => 'required|min:10',
    		'date'  => 'required',
    		'amount' => 'required'
    		]);

    	$expense = new Expense;
    	$expense->issue =$request->issue;
    	$expense->date = $request->date;
    	$expense->amount = $request->amount;
    	$expense->remark = $request->remark;
    	$expense->user_id = Auth::user()->id;
    	$expense->save();

    	return back()->with('successMsg', 'موفقانه ثبت سیستم شد.');
    }

    //delete
    public function delete($id)
    {
    	$expense = Expense::findOrFail(decrypt($id));
    	$expense->delete();

    	return back()->with('successMsg', 'موفقانه حذف شد.');
    }

    //update
    public function update($id)
    {
    	$expense= Expense::findOrFail(decrypt($id));
    	$update = true;

    	return view('cms.expense.expense', compact('update', 'expense'));
    }

    //list 
    public function list()
    {
    	$expenses = Expense::orderBy('created_at', 'DESC')->paginate(2);
    	$list = true;
    	return view('cms.expense.expense', compact('expenses', 'list'));

    }

    //edit
    public function edit(Request $request)
    {
    	    $this->validate($request, [
    		'issue' => 'required|min:10',
    		'date'  => 'required',
    		'amount' => 'required'
    		]);

    	$expense = Expense::findOrFail(decrypt($request->expense_id));
    	$expense->issue =$request->issue;
    	$expense->date = $request->date;
    	$expense->amount = $request->amount;
    	$expense->remark = $request->remark;
    	$expense->user_id = Auth::user()->id;
    	$expense->update();

    	return back()->with('successMsg', 'موفقانه تصحیح شد.');
    }
}
