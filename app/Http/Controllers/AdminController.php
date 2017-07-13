<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Question;
use App\Answer;
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

    		$users = User::paginate(16);
    		return view('admin.users',compact('users'));
    	}
    	flash('抱歉，您没有管理员权限','danger');
    	return back();
    }

    public function showQuestions()
    {
    	if(Auth::user()->is_admin == 'T') {

    		$questions = Question::paginate(16);
    		return view('admin.questions.index',compact('questions'));
    	}
    	flash('抱歉，您没有管理员权限','danger');
    	return back();
    }

    public function showAnswers()
    {
    	if(Auth::user()->is_admin == 'T') {

    		$answers = Answer::paginate(16);
    		return view('admin.answers.index',compact('answers'));
    	}
    	flash('抱歉，您没有管理员权限','danger');
    	return back();

    }

    public function showSpecificQuestion($id)
    {
    	if(Auth::user()->is_admin == 'T') {

    		$question = Question::where('id',$id)->first();
    		return view('admin.questions.details',compact('question'));
    	}
    	flash('抱歉，您没有管理员权限','danger');
    	return back();
    }
}
