<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	//return View::make('hello');
    return Redirect::to('posts');
    //Artisan::call('migrate');
});

// @TO DO Do not forget about auth filters for sign up and login pages.. also for logout page -> DONE
// @TO DO Add login link to signup page and signup link to login page
// @TO DO Create an basic admin panel.
// ['admin.index', 'admin.comments'=> ['listComments','validate', 'unvalidate'], 'admin.posts'=> ['editPost', 'deletePost{id}', 'postsList']]

Route::model('post_id', 'Posts');
Route::get('posts/id/{post_id}', 'PostsController@singlePost');
Route::post('recordComment/{id}', 'PostsController@recordComment')
->before('auth');

Route::get('posts','PostsController@listPosts');

Route::get('logout', function(){
    Auth::logout();
    return Redirect::to('/posts');
});

// If Users Already Logged in They Mustn't Reach This Pages Again..
Route::group(['before'=>'alreadyAuth'],function(){
    Route::get('signup', 'UsersController@signup');
    Route::post('signup', 'UsersController@signupDone');

    Route::get('login', 'UsersController@login');
    Route::post('login', 'UsersController@loginDone');
});
