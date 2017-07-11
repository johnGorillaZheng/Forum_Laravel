<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MessageRepository;
use Auth;

class MessageController extends Controller
{
	protected $message;

	public function __construct(MessageRepository $message)
	{
		$this->message = $message;
	}

    public function store()
    {
        $existed_dialog = $this->message->exists_in_dialog(request('me'),request('user'));
        if($existed_dialog == null) {
            $dialog_id = time().Auth::id();
        } else {
            $dialog_id = $existed_dialog;
        }
        
    	$is_stored = $this->message->create([
    		'to_user_id' => request('user'),
    		'from_user_id' => request('me'),
    		'body' => request('body'),
            'dialog_id' => $dialog_id
    	]);
    	if($is_stored) {
    		return response()->json(['status'=>true]);	
    	}
    	return response()->json(['status'=>false]);
    }
}
