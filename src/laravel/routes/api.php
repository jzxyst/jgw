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

// Sign
Route::get('sign', function () {
    return Auth::user();
})->name('sign');
Route::post('signin', 'Auth\LoginController@login')->name('signin');
Route::post('signout', 'Auth\LoginController@logout')->name('signout');

Route::resource('user', 'UserController')->middleware('auth:api');
Route::resource('user_work_status', 'UserWorkStatusController');
