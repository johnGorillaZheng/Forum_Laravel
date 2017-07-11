<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AnswerRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\CommentRepository;

class CommentsController extends Controller
{
	protected $answer;
	protected $question;
	protected $comment;

	public function __construct(AnswerRepository $answer, QuestionRepository $question, CommentRepository $comment)
	{
		$this->answer = $answer;
		$this->question = $question;
		$this->comment = $comment;
	}

    public function answer($id)
    {
    	return $this->answer->getAnswerCommentsById($id);
    }

    public function question($id)
    {
    	return $this->question->getQuestionCommentsById($id);
    }

    public function store()
    {
    	$model = $this->getModelNameFromType(request('type'));
        if($model == 'question') {
            $questionToChange = $this->question->byId(request('model'));
            $questionToChange->increment('comments_count');
        } else {
            $answerToChange = $this->answer->byId(request('model'));
            $answerToChange->increment('comments_count');
        }
    	$comment = $this->comment->create([
    		'commentable_id' => request('model'),
    		'commentable_type' => $model,
    		'user_id' => request('me'),
    		'body' => request('body')
    	]);

    	return $comment;
    }

    public function getModelNameFromType($type)
    {
    	return $type ==='question'?'App\Question':'App\Answer';
    }
}
