<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function showUsers()
    {
    	if(Auth::user()->is_admin == 'T') {

    		$users = User::all();
    		return view('admin.users',compact('users'));
    	}
    	flash('抱歉，您没有管理员权限','danger');
    	return back();
    }
}
