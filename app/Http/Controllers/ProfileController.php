<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use Auth;
use Hash;

class ProfileController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function show()
    {
    	return view('profile.show');
    }

    public function changeAvatar(Request $request)
    {
    	$me = Auth::user();
    	$file = $request->file('img');
    	$filename = md5(time().Auth::id()).'.'.$file->getClientOriginalExtension();
    	$file->move(public_path('avatars'), $filename);
    	$me->avatar = '/avatars'.'/'.$filename;
    	$me->save();

    	return ['url' => $me->avatar];
    }

    public function changePassword(Request $request)
    {
    	$me = Auth::user();
    	if(Hash::check($request->get('old_password'), $me->password) 
    		&& $request->get('new_password') == $request->get('new_password_confirmation')) {
    		$me->password = bcrypt($request->get('new_password'));
    		$me->save();
    		flash('密码修改成功','success');
    		return back();
    	}
    	if($request->get('new_password') != $request->get('new_password_confirmation')) {
    		flash('新密码与验证密码不一致','danger');
    		return back();
    	}
    	if(!Hash::check($request->get('old_password'), $me->password)) {
    		flash('原密码错误','danger');
    		return back();
    	}
    	flash('密码修改失败','danger');
    	return back();
    }

    public function changeName(Request $request)
    {
    	$me = Auth::user();
    	$me->name = $request->get('chang_name');
    	$me->save();
    	return back();
    }
}
