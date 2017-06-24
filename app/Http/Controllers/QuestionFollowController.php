<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class QuestionFollowController extends Controller
{
    public function follow($question)
    {
    	Auth::user()->follows($question);

    	return back();
    }
}
