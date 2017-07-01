 <?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'auth:api'
], function () {
    //
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/topics',function(Request $request){

	$topics = \App\Topic::select(['id','name'])
		->where('name','like','%'.$request->query('q').'%')
		->get();
	return $topics;
});

Route::post('/question/follower',function (Request $request) {

	$followed = \App\Follow::where('question_id',$request->get('question'))
							->where('user_id',$request->get('user'))
							->count();
	if($followed) {

		return response()->json(['followed' => true]);	
	}
    return response()->json(['followed' => false]);
});

Route::post('/question/follow',function (Request $request) {

	$user = \App\User::find($request->get('user'));
	$question = \App\Question::find($request->get('question'));
	$followed = $user->followsThis($question->id);
	if(count($followed['detached'])>0) {
		$question->decrement('following_count');
		return response()->json(['followed' => false]);	
	}
	$question->increment('following_count');
    return response()->json(['followed' => true]);
});

Route::post('/user/followers','FollowersController@index');

Route::post('/user/follow','FollowersController@follow');
