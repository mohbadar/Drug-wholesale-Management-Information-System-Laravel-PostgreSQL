<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    //create 
    public function create()
    {
    	$users = User::paginate(2);

    	return view('cms.users.user', compact('users'));
     }


    //logout
     public function logout()
     {
     	Auth::logout();
     	return redirect('/');
     }


         //login to system
    public function login(Request $request)
    {

      // dd($request);

    	$this->validate($request,[
    		'email'  => 'required|email',
    		'password' => 'required'
    		]);


    	if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('home');
        } else {
            return redirect()->back();
        }
    }


    //home 
    public function home()
    {
    	return view('cms.home');
    }


    //save 
    public function save(Request $request)
    {
    	// dd($request);
    	$this->validate($request, [
    		'firstname' => 'required|min:3',
    		'email' => 'required|min:10|unique:users',
    		'password' => 'required|min:6',
    		'file'  => 'image',
    		'phone'  => 'required|min:8'
    	]);

    	// dd($request);

    	$user = new User;
    	$user->name= $request->firstname;
    	$user->email = $request->email;
    	$user->phone = $request->phone;
    	$user->password = bcrypt($request->password);

    	$file = $request->file('file');
        $dbPath = "/assets/images/user.png";

    	//dd($file);
	    if ($file) {
	      	$fileExtension = $file->getClientOriginalExtension();
	        $dbPath = "/files/users/".time().'.'.$fileExtension;
	        $file->move(public_path("/files/users/"), $dbPath);
	    }

        $user->photo= $dbPath;

	    $user->save();
	    return back()->with('successMsg', 'استفاده کننده موفقانه ثبت سیستم گردید.');
    }

    //user delete
    public function delete($id)
    {
    	$user = User::findOrFail(decrypt($id));
    	$user->delete();

	    return back()->with('successMsg', 'استفاده کننده موفقانه از سیستم حذف  گردید.');
    }

    //update user
    public function update($id)
    {
    	$user = User::findOrFail(decrypt($id));
    	$update = true;

    	return view('cms.users.user', compact('update', 'user'));
    }

    //save update
    public function edit(Request $request)
    {
    	    	// dd($request);
    	$this->validate($request, [
    		'firstname' => 'required|min:3',
    		'email' => 'required|min:10',
    		'password' => 'required|min:6',
    		'file'  => 'image',
    		'phone'  => 'required|min:8'
    	]);

    	// dd($request);

    	$user =User::findOrFail(decrypt($request->user_id));
    	$user->name= $request->firstname;
    	$user->email = $request->email;
    	// $user->phone = $request->phone;
    	$user->password = bcrypt($request->password);

    	$file = $request->file('file');

    	//dd($file);
	    if ($file) {
	      	$fileExtension = $file->getClientOriginalExtension();
	        $dbPath = "/files/users/".time().'.'.$fileExtension;
	        $file->move(public_path("/files/users/"), $dbPath);
	        $user->photo= $dbPath;
	    }

	    $user->update();
	    return back()->with('successMsg', 'استفاده کننده موفقانه تصحیح گردید.');
    }
}
