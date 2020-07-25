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

Route::get('/directory-listing', ['uses'=>'DirectoryListingController@index', 'as'=>'listing.index']);

Route::post('upload', 'DirectoryListingController@upload');

Route::get('/delete/{filename}', ['uses'=>'DirectoryListingController@delete']);
Route::get('/history-listing', ['uses'=>'HistoryListingController@index', 'as'=>'history.index']);

