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

Route::get('groups','UserGroupController@index');
Route::get('groups/create','UserGroupController@create');
Route::post('groups','UserGroupController@store');
Route::delete('groups/{id}','UserGroupController@destroy');

Route::resource('users', 'UserController',['except'=>'show']);

