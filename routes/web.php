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
Route::get('/register/confirm/{token}', 'Auth\RegisterController@confirmEmail');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/{network}', 'Auth\SocialAccountController@redirectToProvider');

Route::get('/callback/{network}/', 'Auth\SocialAccountController@callback');
