<?php

namespace App\Repositories;
use App\Message;

class MessageRepository
{
	public function create(array $attributes)
	{
		return Message::create($attributes);
	}

	public function byId($id)
	{
		return Message::find($id);
	}

	public function exists_in_dialog($me, $user)
	{
		$message1 = Message::where('from_user_id',$me)
							->where('to_user_id',$user)
							->first();
		$message2 = Message::where('from_user_id',$user)
							->where('to_user_id',$me)
							->first();
		if($message1 == null && $message2 == null) {
			return null;
		}
		if($message1 == null && $message2 != null) {
			return $message2->dialog_id;
		}
		return $message1->dialog_id;
	}
}