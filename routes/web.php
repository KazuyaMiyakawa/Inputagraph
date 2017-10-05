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
    //return view('welcome');
    return View::make('list');
});

Route::get('list', function() {
  return View::make('list');
});

Route::get('upload', 'UploadController@index')->middleware('auth');
Route::post('/store_upload',['as' => 'store',
                      'uses' => 'UploadController@store']);

Route::get('user', 'UserController@index')->middleware('auth');
Route::post('/user_store_icon',['as' => 'store',
                      'uses' => 'UserController@storeIcon']);
Route::post('/user_store_profile',['as' => 'store',
                      'uses' => 'UserController@storeProfile']);

Route::get('like', 'LikeController@changeLikeState');
Route::get('like_state', 'LikeController@getLikeState');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', 'UserController@logout')->middleware('auth');
