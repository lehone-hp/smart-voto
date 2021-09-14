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

Route::get('polls/{slug}/token/{token}', 'PollController@show')->name('web.polls.show');
Route::group(['prefix' => 'api'], function () {
    Route::get('/polls/{poll}/candidates', 'PollController@candidates');
    Route::post('/polls/{poll}/vote', 'PollController@vote');
    Route::get('/voters/{token}', 'PollController@getVoter');
});

Route::group(['middleware' => 'auth', 'namespace' => 'User'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/profile', 'ProfileController@index')->name('profile.index');

    Route::resource('polls', 'PollController');

    Route::group(['prefix' => 'api'], function () {
        Route::get('/polls/{poll}/voters', 'VoterController@index');
        Route::post('/polls/{poll}/voters', 'VoterController@store');
    });
});


