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


Route::get('bucket-lists', 'BucketListController@index');
Route::get('bucket-lists/{bucketList}', 'BucketListController@show');
Route::post('bucket-lists', 'BucketListController@store');
