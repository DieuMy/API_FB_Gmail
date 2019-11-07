<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
//Route::get('auth/facebook', 'FacebookController@redirectToProvider')->name('facebook.login');
//Route::get('auth/facebook/callback', 'FacebookController@handleProviderCallback');

//facebook
Route::get('auth/facebook', 'FacebookAuthController@redirectToProvider')->name('facebook.login') ;
Route::get('auth/facebook/callback', 'FacebookAuthController@handleProviderCallback');

//gmail
//Route::get('/redirect', 'GmailController@redirect');
//Route::get('/callback', 'GmailController@callback');
Route::get('login/gmail', 'GmailController@redirectToProvider')->name('gmail.login');
Route::get('login/gmail/callback', 'GmailController@handleProviderCallback');


Route::get('/oauth/gmail', function (){
    return LaravelGmail::redirect();
});

Route::get('/oauth/gmail/callback', function (){
    LaravelGmail::makeToken();
    return redirect()->to('/');
});

Route::get('/oauth/gmail/logout', function (){
    LaravelGmail::logout(); //It returns exception if fails
    return redirect()->to('/');
});
//home
Route::get('/home', 'HomeController@index')->name('home');
