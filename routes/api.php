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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('todos')->middleware('auth:api')->group(function () {
    Route::get('/', 'TodoController@index');
    Route::post('/', 'TodoController@store');
    Route::get('{id}', 'TodoController@show');
    Route::put('{id}', 'TodoController@update');
    Route::delete('{id}', 'TodoController@destroy');
});