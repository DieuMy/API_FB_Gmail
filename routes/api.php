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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//user
Route::get('/users','UserController@index');
Route::get('/user/{id}','UserController@getUser')->name('getUser');
Route::post('/addUser','UserController@add')->name('add');
Route::put('/editUser/{id}','UserController@editUser')->name('editUser');
Route::put('/editPassword/{id}','UserController@editPassword')->name('editPassword');
Route::delete('/delete/{id}','UserController@deleteUser')->name('delete');