<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'user'], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');
});

Route::group(['prefix' => 'movie', 'middleware' => ['auth:api']], function () {
    Route::get('list', 'MovieController@list');
    Route::post('register', 'MovieController@store');
    Route::put('update/{movie}', 'MovieController@update');
    Route::delete('delete/{movie}', 'MovieController@delete');
});
