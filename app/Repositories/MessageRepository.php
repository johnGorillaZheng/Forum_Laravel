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
		return Answer::find($id);
	}
}