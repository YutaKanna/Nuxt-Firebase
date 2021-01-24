<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function() {
    return 'helloworld';
});

Route::get('bucket-lists', 'Api\BucketListController@index');
Route::get('bucket-lists/{id}', 'Api\BucketListController@show');
Route::post('bucket-lists/new', 'Api\BucketListController@store');
Route::patch('bucket-lists/{id}', 'Api\BucketListController@update');
Route::delete('bucket-lists/{id}', 'Api\BucketListController@destroy');

// hoge
Route::get('hoge', 'Api\HogeController@index');
Route::post('hoge/new', 'Api\HogeController@store');