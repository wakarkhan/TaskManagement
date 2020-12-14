<?php

Route::get('profile', 'UserController@show')->middleware('auth');

Route::get('/', 'DashboardController@index');

### USER ROUTING ###
Route::resource('user', 'UserController');
Route::post('/user/updateUserPassword', 'UserController@updateUserPassword');
Route::post('/user/deleteUser', 'UserController@deleteUser');
### END USER ROUTING ###
