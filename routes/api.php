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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('guest')->post('login', 'App\Http\Controllers\API\LoginController@login');

Route::middleware('auth:sanctum')->group(function() {
    Route::post('logout', 'App\Http\Controllers\API\LoginController@logout');

    Route::apiResource('railcars', 'App\Http\Controllers\API\RailcarController');

    Route::get('options/{type}', 'App\Http\Controllers\API\OptionController@index');
});
