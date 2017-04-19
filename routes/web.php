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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'logRegController@index');
Route::match(array('POST','GET'),'login', 'logRegController@loginUser');
Route::group(['middleware'=>['clearCache']],function(){
    Route::get('/', 'logRegController@index');
});
Route::group(['middleware'=>['auth']],function(){
    Route::group(['middleware'=>['clearCache']],function(){
        Route::get('home', 'logRegController@home');
    });
});