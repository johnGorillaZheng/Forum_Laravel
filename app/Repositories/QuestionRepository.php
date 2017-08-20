<?php
namespace App\Repositories;
use App\Question; 
use App\Topic;
use App\Follow;
use App\Answer;
/**
* 
*/
class QuestionRepository
{
	
	public function ownedAnswers($id)
	{
		return Answer::where('question_id',$id)->with('user')->get();
	}

	public function ownedTopics($id)
	{
		return Topic::join('question_topic','topics.id','=','question_topic.topic_id')
						->join('questions','questions.id','=','question_topic.question_id')
						->select(
							'topics.name as topic_name'
							)
						->where('question_topic.question_id',$id)
						->get();
	}

	public function create(array $attributes)
	{
		return Question::create($attributes);
	}

	public function normalizeTopic(array $topics)
	{
		return  collect($topics)->map(function ($topic){
			if(is_numeric($topic)){
            	Topic::find($topic)->increment('question_count');
                return (int)$topic;
            }
            $newTopic = Topic::create(['name' => $topic,'question_count' => 1]);
            return $newTopic->id; 
        })->toArray();
	}

	public function byId($id)
	{
		return Question::find($id);
	}

	public function getQuestionFeed()
	{
		return Question::published()->latest('updated_at')->with('user')->paginate(16);
	}

	public function getQuestionCommentsById($id)
	{
		$question = Question::with('comments','comments.user')
    					->where('id',$id)->first();
    	return $question->comments;
	}
}