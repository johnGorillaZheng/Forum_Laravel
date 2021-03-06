<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class EmailController extends Controller
{   
    public function confirmation($email_token)
    {
        $user = User::where('confirmation_token',$email_token)->first();

        if(!is_null($user)){
            $user->is_active = 1;
            $user->confirmation_token = '';
            $user->save();
            Auth::login($user);
            flash('邮箱验证成功','success');
            return redirect(route('login'))->with('status','Your activation is completed');
        }else{
            flash('邮箱验证失败','danger');
            return redirect('/');
        }
        return redirect(route('welcome'))->with('status','Something went wrong');
    }
}
