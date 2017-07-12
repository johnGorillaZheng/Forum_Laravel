<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = ['from_user_id','to_user_id','body','dialog_id'];

    public function fromUser()
    {
    	return $this->belongsTo(User::class,'from_user_id');
    }

    public function toUser()
    {
    	return $this->belongsTo(User::class,'to_user_id');
    }

    public function read()
    {
        return $this->has_read === 'T';
    }

    public function unread()
    {
        return $this->has_read === 'F';
    }

    public function shouldAddUnreadClass()
    {
        if(Auth::id() === $this->from_user_id) {
            return false;
        }
        return $this->unread();
    }
}
