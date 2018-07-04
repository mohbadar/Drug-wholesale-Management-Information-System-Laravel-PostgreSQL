<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Drug;

class AjaxController extends Controller
{
    //getCompanies
    public function getCompanies(Request $request)
    {
    	$id = decrypt($request->id);

    	$companies = Company::where('country_id', $id)->get();

    	return response()->json($companies);
    }

    //getDrugs
    public function getDrugs(Request $request)
    {
    	$categoryId = decrypt($request->categoryId);
    	$countryId = decrypt($request->countryId);

    	$drugs = Drug::orderBy('created_at', 'DESC')->where('country_id', $countryId)->where('category_id', $categoryId)->get();
    	return response()->json($drugs);
    }
}
