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

Auth::routes();

Route::get('/', 'UserController@index')
->middleware('auth')
->name('users.index');

Route::group(['prefix' => 'users', 'as' => 'users.', 'middleware' => 'auth'], function () {
    Route::post('/swipes', 'SwipesController@store')->name('swipes.store');
    Route::get('/matches', 'UserController@match')->name('match');
});