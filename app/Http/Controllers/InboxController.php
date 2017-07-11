<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Message;

class InboxController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {	
    	$messages = Message::where('to_user_id',Auth::id())
                ->orWhere('from_user_id',Auth::id())
                ->with(['fromUser','toUser'])->get();
    	return view('inbox.index',['messages' => $messages->unique('dialog_id')->groupBy('to_user_id')]);
    }

    public function show($dialogId)
    {
    	$messages = Message::where('dialog_id',$dialogId)->orderBy('created_at','desc')->get();

    	return view('inbox.show',compact('messages','dialogId'));
    }

    public function store($dialogId)
    {
        $message = Message::where('dialog_id',$dialogId)->first();
        $to_user_id = $message->from_user_id === Auth::id() ? $message->to_user_id : $message->from_user_id;
        Message::create([
            'from_user_id' => Auth::id(),
            'to_user_id' => $to_user_id,
            'body' => request('body'),
            'dialog_id' => $dialogId
        ]);

        return back();
    }
}
