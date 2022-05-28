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



Route::get('/', ['uses' => 'App\Http\Controllers\Admin\DashboardController@index']);

Route::get('/admin', ['uses' => 'App\Http\Controllers\Admin\DashboardController@index']);
Route::get('/admin/categories', ['uses' => 'App\Http\Controllers\Admin\CategoryController@show']);
Route::get('/admin/categories/edit', ['uses' => 'App\Http\Controllers\Admin\CategoryController@edit']);
Route::get('/admin/categories/edit/{edit_id}', ['uses' => 'App\Http\Controllers\Admin\CategoryController@edit']);
Route::post('/admin/categories/edit', ['uses' => 'App\Http\Controllers\Admin\CategoryController@save']);
Route::get('/admin/categories/delete/{del_id}', ['uses' => 'App\Http\Controllers\Admin\CategoryController@delete']);

Route::post('/admin/categories/iconupload', ['uses' => 'App\Http\Controllers\Admin\CategoryController@iconupload']);
