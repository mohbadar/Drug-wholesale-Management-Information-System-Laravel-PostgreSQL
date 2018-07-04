<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [
	'uses' => 'UserController@home',
	'as'   => 'home'
]);

//////////////////////////////////////////////////////////////////////////////////////////////
									///USER ROUTES///
/////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/users', [
	'uses' => 'UserController@create',
	'as'   => 'user.create'
]);

Route::get('/logout', [
	'uses' => 'UserController@logout',
	'as'   => 'logout'
]);

//login
Route::post('/login', [
	'uses' => 'UserController@login',
	'as'   => 'login'
]);

//create user post
Route::post('/create-user', [
	'uses' => 'UserController@save',
	'as'   => 'user.create.post'
]);

//user delete
Route::get('/user-delete/{id}', [
	'uses' => 'UserController@delete',
	'as'   => 'user.delete'
]);

//user update
Route::get('/user-update/{id}' ,[
	'uses' => 'UserController@update',
	'as'   => 'user.update'
]);

//save user update
Route::post('/user-edit', [
	'uses' => 'UserController@edit',
	'as'   => 'user.edit'
]);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
												//COUNTRY ROUTES//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/create-country', [
	'uses' => 'CountryController@create',
	'as'   => 'country.create'
]);

Route::post('/save-county', [
	'uses' => 'CountryController@save',
	'as'   => 'country.save'
]);

Route::get('/country-delete/{id}', [
	'uses' => 'CountryController@delete',
	'as'   => 'country.delete'
]);

Route::get('/country-update/{id}', [
	'uses' => 'CountryController@update',
	'as'   => 'country.update'
]);

Route::post('/country-edit', [
	'uses' => 'CountryController@edit',
	'as'   => 'country.edit'
]);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
												//COMPANY ROUTES//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/create-company', [
	'uses' => 'CompanyController@create',
	'as'   => 'company.create'
]);

Route::post('/save-company', [
	'uses' => 'CompanyController@save',
	'as'   => 'company.save'
]);

Route::get('/company-delete/{id}', [
	'uses' => 'CompanyController@delete',
	'as'   => 'company.delete'
]);

Route::get('/company-update/{id}', [
	'uses' => 'CompanyController@update',
	'as'   => 'company.update'
]);

Route::post('/company-edit', [
	'uses' => 'CompanyController@edit',
	'as'   => 'company.edit'
]);


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
												//CUSTOMER ROUTES//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/create-customer', [
	'uses' => 'CustomerController@create',
	'as'   => 'customer.create'
]);

Route::post('/save-customer', [
	'uses' => 'CustomerController@save',
	'as'   => 'customer.save'
]);

Route::get('/customer-delete/{id}', [
	'uses' => 'CustomerController@delete',
	'as'   => 'customer.delete'
]);

Route::get('/customer-update/{id}', [
	'uses' => 'CustomerController@update',
	'as'   => 'customer.update'
]);

Route::post('/customer-edit', [
	'uses' => 'CustomerController@edit',
	'as'   => 'customer.edit'
]);

Route::get('/list-customers', [
	'uses' => 'CustomerController@list',
	'as'   => 'list.customers'
]);

Route::post('/customer-search', [
	'uses' => 'CustomerController@search',
	'as'   => 'customer.search'
	]);
Route::get('/customer-report/{id}', [
	'uses' => 'CustomerController@report',
	'as'   => 'customer.report'
	]);

/////////////////////////////////////////////////////////////////////////////////////////////////
								////LOAN ROUTE///
/////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/loan-create', [
	'uses' => 'LoanController@create',
	'as'   => 'loan.create'
	]);

Route::post('/loan-save', [
	'uses'  => 'LoanController@save',
	'as'    => 'loan.save'
	]);

Route::get('/loan-update/{id}', [
	'uses' => 'LoanController@update',
	'as'   => 'loan.update'
	]);

Route::post('/loan-edit', [
	'uses' => 'LoanController@edit',
	'as'   => 'loan.edit'
	]);
Route::get('/loan-delete/{id}', [
	'uses' => 'LoanController@delete',
	'as'   => 'loan.delete'
	]);

Route::get('/list-loans', [
	'uses' => 'LoanController@list',
	'as'   => 'list.loans'
	]);


/////////////////////////////////////////////////////////////////////////////////////////////////
								////RETURN ROUTE///
/////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/return-create', [
	'uses' => 'ReturnController@create',
	'as'   => 'return.create'
	]);

Route::post('/return-save', [
	'uses'  => 'ReturnController@save',
	'as'    => 'return.save'
	]);

Route::get('/return-update/{id}', [
	'uses' => 'ReturnController@update',
	'as'   => 'return.update'
	]);

Route::post('/return-edit', [
	'uses' => 'ReturnController@edit',
	'as'   => 'return.edit'
	]);
Route::get('/return-delete/{id}', [
	'uses' => 'ReturnController@delete',
	'as'   => 'return.delete'
	]);

Route::get('/return-loans', [
	'uses' => 'ReturnController@list',
	'as'   => 'list.returns'
	]);
/////////////////////////////////////////////////////////////////////////////////////////////////
								////DRUG ROUTE///
/////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/drug-create', [
	'uses' => 'DrugController@create',
	'as'   => 'drug.create'
	]);

Route::post('/drug-save', [
	'uses'  => 'DrugController@save',
	'as'    => 'drug.save'
	]);

Route::get('/drug-update/{id}', [
	'uses' => 'DrugController@update',
	'as'   => 'drug.update'
	]);

Route::post('/drug-edit', [
	'uses' => 'DrugController@edit',
	'as'   => 'drug.edit'
	]);
Route::get('/drugdrug-delete/{id}', [
	'uses' => 'DrugController@delete',
	'as'   => 'drug.delete'
	]);

Route::get('/drugs-list', [
	'uses' => 'DrugController@list',
	'as'   => 'list.drugs'
	]);

Route::get('/getCompanies', [
	'uses' => 'AjaxController@getCompanies',
	'as'   => 'getCompanies'
	]);

Route::post('/drug-search', [
	'uses' => 'DrugController@search',
	'as'   => 'drug.search'
	]);

Route::get('/drug-list-based-on-expire-date', [
	'uses' => 'DrugController@list_expire_date',
	'as'   => 'list.drugs.expire'
	]);


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
												//CATEGORY ROUTES//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/create-category', [
	'uses' => 'CategoryController@create',
	'as'   => 'category.create'
]);

Route::post('/save-category', [
	'uses' => 'CategoryController@save',
	'as'   => 'category.save'
]);

Route::get('/category-delete/{id}', [
	'uses' => 'CategoryController@delete',
	'as'   => 'category.delete'
]);

Route::get('/category-update/{id}', [
	'uses' => 'CategoryController@update',
	'as'   => 'category.update'
]);

Route::post('/category-edit', [
	'uses' => 'CategoryController@edit',
	'as'   => 'category.edit'
]);


/////////////////////////////////////////////////////////////////////////////////////////////////
								////Expense ROUTE///
/////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/expense-create', [
	'uses' => 'ExpenseController@create',
	'as'   => 'expense.create'
	]);

Route::post('/expense-save', [
	'uses'  => 'ExpenseController@save',
	'as'    => 'expense.save'
	]);

Route::get('/expense-update/{id}', [
	'uses' => 'ExpenseController@update',
	'as'   => 'expense.update'
	]);

Route::post('/expense-edit', [
	'uses' => 'ExpenseController@edit',
	'as'   => 'expense.edit'
	]);
Route::get('/expense-delete/{id}', [
	'uses' => 'ExpenseController@delete',
	'as'   => 'expense.delete'
	]);

Route::get('/list-expense', [
	'uses' => 'ExpenseController@list',
	'as'   => 'list.expenses'
	]);


/////////////////////////////////////////////////////////////////////////////////////////////////
								////BILL ROUTE///
/////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/bill-create', [
	'uses' => 'BillController@create',
	'as'   => 'bill.create'
	]);

Route::post('/bill-save', [
	'uses'  => 'BillController@save',
	'as'    => 'bill.save'
	]);

Route::get('/bill-update/{id}', [
	'uses' => 'BillController@update',
	'as'   => 'bill.update'
	]);

Route::post('/bill-edit', [
	'uses' => 'BillController@edit',
	'as'   => 'bill.edit'
	]);
Route::get('/bill-delete/{id}', [
	'uses' => 'BillController@delete',
	'as'   => 'bill.delete'
	]);

Route::get('/list-bills', [
	'uses' => 'BillController@list',
	'as'   => 'list.bills'
	]);

Route::get('/bill/items/{id}', [
	'uses'  => 'BillController@bill_items',
	'as'    => 'bill.details'
	]);

Route::get('/getDrugs', [
	'uses' => 'AjaxController@getDrugs',
	'as'   => 'getDrugs'
	]);

Route::post('/bill/item/register', [
	'uses' => 'BillController@register_item',
	'as'   => 'bill.detail.save'
	]);

Route::get('/bill/item/delete/{id}', [
	'uses' => 'BillController@delete_item',
	'as'   => 'bill.detail.delete'
	]);


//////////////////////////////////////////////////////////////////////////////////////////
						// REPORTS ROUTES
/////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/customers/report', [
	'uses'  => 'ReportController@customers_report',
	'as'    => 'customers.report'
	]);

Route::get('/expenses/report', [
	'uses'  => 'ReportController@expenses_report',
	'as'    => 'expenses.report'
	]);

Route::get('/bills/report', [
	'uses'  => 'ReportController@bills_report',
	'as'    => 'bills.report'
	]);