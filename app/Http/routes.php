<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/', function () {
    return view('search');
});

Route::get('feed', 'WelcomeController@feed');
Route::get('search', 'WelcomeController@search');
Route::get('callback', 'HomeController@callback');
Route::resource('queries', 'QueryController');
Route::get('questions', 'myController@questions')->name('questions');
Route::post('questions', 'myController@new_question')->name('new_question');
Route::get('answers', 'myController@answers')->name('answers');
Route::post('answers', 'myController@new_answer')->name('new_answer');
Route::get('json', 'myController@songs_json')->name('sjson');
Route::any('add/song', 'myController@add_song')->name('add_song');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
