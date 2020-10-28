<?php

Route::get('profile', 'UserController@show')->middleware('auth');

Route::get('/', 'DashboardController@index');

Route::resource('user', 'UserController');
