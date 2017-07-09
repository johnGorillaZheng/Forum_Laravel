<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar','confirmation_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function owns($model)
    {
        return $this->id == $model->user_id;        
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function follows()
    {
        return $this->belongsToMany(Question::class,'user_question')->withTimestamps();
    }

    public function followsThis($question)
    {
        return $this->follows()->toggle($question);
    }

    public function followed($question)
    {
        return $this->follows()->where('question_id',$question)->count();
    }

    public function followers()
    {
        return $this->belongsToMany(self::class,'followers','follower_id','followed_id')->withTimestamps();
    }

    public function followersUsers()
    {
        return $this->belongsToMany(self::class,'followers','followed_id','follower_id')->withTimestamps();
    }

    public function followThisUser($user)
    {
        return $this->followers()->toggle($user);
    }

    public function votes()
    {
        return $this->belongsToMany(Answer::class,'votes')->withTimestamps();
    }

    public function voteFor($answer)
    {
        return $this->votes()->toggle($answer);
    }

    public function hasVotedFor($answer)
    {
        return !! $this->votes()->where('answer_id',$answer)->count();
    }
}
