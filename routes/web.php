<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','WelcomeController@show');

Auth::routes();

Route::get('/home', 'QuestionsController@index')->name('home');

Route::get('/users/confirmation/{email_token}', 'EmailController@confirmation')->name('confirmation');

Route::resource('questions','QuestionsController',['names' => [
		'create' => 'questions.create',
		'show' => 'questions.show',
	]]);

Route::post('questions/{question}/answer','AnswersController@store');

Route::get('questions/{question}/follow','QuestionFollowController@follow');

Route::get('notifications','NotificationsController@index');

Route::get('inbox','InboxController@index');

Route::get('inbox/{dialogId}','InboxController@show');

Route::post('inbox/{dialogId}/store','InboxController@store');