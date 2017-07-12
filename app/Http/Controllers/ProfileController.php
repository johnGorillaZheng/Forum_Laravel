<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
    	$me->avatar = asset(public_path('avatars/'.$filename));
    	$me->save();

    	return ['url' => $me->avatar];
    }
}
