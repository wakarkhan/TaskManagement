<?php

Route::get('profile', 'UserController@show')->middleware('auth');


Route::get('/', function(){
    return view('dashboard');
});

Route::resource('user', 'UserController');
