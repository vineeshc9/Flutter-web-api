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

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\DashboardController;

Route::get('dashboard','DashController@index');
Route::get('create-category','CategoryController@create');
Route::post('post-category-form','CategoryController@store');
Route::get('all-category','CategoryController@index');
Route::get('edit-category/{id}', 'CategoryController@edit' );
Route::post('update-category/{id}','CategoryController@update');
Route::get('delete-category/{id}','CategoryController@destroy');

Route::get('get-blopost-form','BlogPostController@create');
Route::post('store-blog-post', 'BlogPostController@store');
Route::get('all-blog-post','BlogPostController@index');
Route::get('edit-blog-post/{id}', 'BlogPostController@edit' );


