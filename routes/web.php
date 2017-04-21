<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function() {
    return redirect()->route('login');
});
Route::match(array('POST','GET'),'loginUser', 'logRegController@login');
Route::group(['middleware'=>['clearCache']],function(){
    Route::get('login', 'logRegController@index')->name('login');
});
Route::group(['middleware'=>['auth']],function(){
    Route::group(['middleware'=>['clearCache']],function(){
        Route::get('home', 'HomeController@home');
        Route::post('editUser', 'homeController@editUser');
        Route::get('getFriends', 'LeftSideController@getFriends');
        Route::get('getTodo', 'LeftSideController@getTodo');
        Route::get('getNotFriends', 'LeftSideController@getNotFriends');
        Route::post('addTodo', 'LeftSideController@addTodo');
        Route::post('completeTodo','LeftSideController@completeTodo');
        Route::get('getPendingFriends','LeftSideController@getPendingFriends');
        Route::get('getFriendRequest','LeftSideController@getFriendRequest');
        Route::post('acceptFriend','LeftSideController@acceptFriend');


        Route::post('addFriend','LeftSideController@addFriend');
        Route::post('profile/addFriend','LeftSideController@addFriend');


        Route::post('profile/acceptFriend','LeftSideController@acceptFriend');
        Route::get('profile/getFriendRequest','LeftSideController@getFriendRequest');
        Route::get('profile/getPendingFriends','LeftSideController@getPendingFriends');
        Route::get('profile/getFriends', 'LeftSideController@getFriends');
        Route::get('profile/getTodo', 'LeftSideController@getTodo');
        Route::get('profile/getNotFriends', 'LeftSideController@getNotFriends');
        Route::post('profile/addTodo', 'LeftSideController@addTodo');
        Route::post('profile/completeTodo','LeftSideController@completeTodo');
        Route::get('profile/{id}','VisitController@profile');
    });
});
Route::get('logout', function(){
    Auth::logout();
    return Redirect::to('/');
});