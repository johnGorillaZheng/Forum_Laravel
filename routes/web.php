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

Route::get('/','QuestionsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users/confirmation/{email_token}', 'EmailController@confirmation')->name('confirmation');

Route::resource('questions','QuestionsController',['names' => [
		'create' => 'questions.create',
		'show' => 'questions.show',
	]]);
