<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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

    public function follows($question)
    {
        return Follow::create([
            'question_id' => $question,
            'user_id' => $this->id
        ]);
    }
}
