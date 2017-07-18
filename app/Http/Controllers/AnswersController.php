<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AnswerRepository;
use Auth;
use Carbon;
use App\Http\Requests\StoreAnswerRequest;

class AnswersController extends Controller
{

	protected $answer;


	public function __construct(AnswerRepository $answer)
	{
		$this->answer = $answer;
	}

    public function store(Request $request, $question)
    {
    	$answer = $this->answer->create([
    		'question_id' => $question,
    		'user_id' => Auth::id(),
    		'body' => $request->get('body')

    		]);
    	$answer->question()->increment('answers_count');
        $answer->question()->update(['updated_at' => Carbon\Carbon::now()]);
    	return back();
    }
}
