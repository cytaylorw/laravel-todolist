<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register','Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');

Route::prefix('users')->middleware('auth:api')->group(function () {
    Route::get('/', 'UserController@index');
    Route::get('{id}', 'UserController@show');
    Route::get('{id}/todos', 'UserController@getTodos');
});


Route::prefix('todos')->middleware('auth:api')->group(function () {
    Route::get('/', 'TodoController@index');
    Route::post('/', 'TodoController@store');
    Route::get('{id}', 'TodoController@show');
    Route::put('{id}', 'TodoController@update');
    Route::delete('{id}', 'TodoController@destroy');
    Route::get('{id}/user', 'TodoController@getUser');
});
});