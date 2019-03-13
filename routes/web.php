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

Route::group(['prefix' => 'jobs'], function () {
    // Jobs index
    // NOTE: You can replace this with resources controller
    // NOTE: Feel free to add more routes as needed
    Route::get('/', [
        'as' => 'jobs.index',
        'uses' => 'JobsController@index'
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
