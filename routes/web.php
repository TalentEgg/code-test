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

    Route::get('/', [
        'as' => 'jobs.index',
        'uses' => 'JobsController@index'
    ]);
    Route::get('/add', [
        'as' => 'job.add',
        'uses' => 'JobsController@add'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'job.edit',
        'uses' => 'JobsController@edit'
    ]);
    Route::post('/store/{id?}', [
        'as' => 'job.store',
        'uses' => 'JobsController@store'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'job.delete',
        'uses' => 'JobsController@delete'
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
