<?php

Route::get('/', 'AuthenticationController@index');
Route::post('/authentication/checkLogin', 'AuthenticationController@checkLogin');

### USER ROUTING ###
Route::resource('user', 'UserController');
Route::post('/user/updateUserPassword', 'UserController@updateUserPassword');
Route::post('/user/deleteUser', 'UserController@deleteUser');
### END USER ROUTING ###
