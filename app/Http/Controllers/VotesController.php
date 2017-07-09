<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Answer;

class VotesController extends Controller
{
    protected $answer;

    public function __constructor(AnswerRepository $answer)
    {
    	$this->answer = $answer;
    }

    public function users()
    {
		$user = User::find(request('me'));

		if($user->hasVotedFor(request('answer'))) {
			return response()->json(['voted' => true]);
		}
		return response()->json(['voted' => false]);
    }

    public function vote()
    {
    	$answer = Answer::find(request('answer'));
        $me = User::find(request('me'));
        $voted = $me->voteFor(request('answer'));
        if(count($voted['attached']) > 0) {
            $answer->increment('votes_count');
            return response()->json(['voted'=>true]);
        }
        $answer->decrement('votes_count');
        return response()->json(['voted'=>false]);
    }
}
