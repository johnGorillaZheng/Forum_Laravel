<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MessageRepository;

class MessageController extends Controller
{
	protected $message;

	public function __construct(MessageRepository $message)
	{
		$this->message = $message;
	}

    public function store()
    {
    	$is_stored = $this->message->create([
    		'to_user_id' => request('user'),
    		'from_user_id' => request('me'),
    		'body' => request('body')
    	]);
    	if($is_stored) {
    		return response()->json(['status'=>true]);	
    	}
    	return response()->json(['status'=>false]);
    }
}
