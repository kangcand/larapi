<?php

use Illuminate\Http\Request;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('users','UserController@user');
Route::get('users/profil','UserController@profil')->middleware('auth:api');
Route::post('auth/register','AuthController@register');
Route::post('auth/login','AuthController@login');
Route::post('post','PostController@add')->middleware('auth:api');