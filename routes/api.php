<?php

use Illuminate\Http\Request;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('users','UserController@user');
Route::get('users/{id}','UserController@profilById')->middleware('auth:api');
Route::get('users/profil','UserController@profil')->middleware('auth:api');
Route::post('auth/register','AuthController@register');
Route::post('auth/login','AuthController@login');
Route::post('post','PostController@add')->middleware('auth:api');
Route::put('post/{post}','PostController@update')->middleware('auth:api');
Route::delete('post/{post}','PostController@delete')->middleware('auth:api');