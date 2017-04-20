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
    });
});
Route::get('logout', function(){
    Auth::logout();
    return Redirect::to('/');
});