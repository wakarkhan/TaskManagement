<?php

Route::get('profile', 'UserController@show')->middleware('auth');


Route::get('/', function(){
    return view('welcome');
});

Route::resource('user', 'UserController');
