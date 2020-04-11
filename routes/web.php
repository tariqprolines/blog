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

Route::get('/', ['uses' => 'BlogController@index', 'as' => 'home']);
Route::get('/newPost','BlogController@create')->name('newPost');
Route::post('/newPost',[
    'uses' => 'BlogController@store',
    'as'   => 'newPost'
]);
Route::get('/show/{id}',[
    'uses' =>'BlogController@show',
    'as' => 'showPost'
]);
Route::post('/saveComment/{id}',[
    'uses' => 'CommentController@savecomment',
    'as'   => 'saveComment'
]);
Route::get('/search',[
    'uses' => 'BlogController@search',
    'as' => 'search'
]);