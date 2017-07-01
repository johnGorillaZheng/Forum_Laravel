<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewUserFollowNotification;

class FollowersController extends Controller
{
	protected $user;

	public function __construct(UserRepository $user)
	{
		$this->user = $user;
	}

    public function index()
    {
        $followed = DB::table('followers')
                        ->where('follower_id',request('me'))
                        ->where('followed_id',request('user'))
                        ->count();
    	if($followed == 1) {
    		return response()->json(['followed'=>true]);
    	}
    	return response()->json(['followed'=>false]);
    }

    public function follow()
    {
    	$userToFollow = $this->user->byId(request('user'));
        $me = $this->user->byId(request('me'));
        $followed = $me->followThisUser($userToFollow->id);
        if(count($followed['attached']) > 0) {
            $userToFollow->notify(new NewUserFollowNotification($me));
            $userToFollow->increment('followers_count');
            return response()->json(['followed'=>true]);
        }
        $userToFollow->decrement('followers_count');
        return response()->json(['followed'=>false]);
    }
}
