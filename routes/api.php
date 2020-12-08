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

Route::prefix('v1')->group(function () {
    Route::group(['prefix' => 'login', 'as' => 'login.'], function () {
        Route::post('auth', 'App\Http\Controllers\Api\LoginController@auth');
    });
});

Route::prefix('v1')->group(function () {
    Route::group(['middleware' => ['dealer-sites-auth']], function () {
        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::resource('user', 'App\Http\Controllers\Api\UserController');
        });
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
