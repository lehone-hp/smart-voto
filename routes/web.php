<?php

use Illuminate\Support\Facades\Route;

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
})->name('index');

Route::get('/login/okta', 'Auth\LoginController@redirectToProvider')->name('login-okta');
Route::get('/authorization-code/callback', 'Auth\LoginController@handleProviderCallback');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth', 'namespace' => 'User'], function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/profile', 'ProfileController@index')->name('profile.index');

    Route::resource('polls', 'PollController');
});


