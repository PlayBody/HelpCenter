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



Route::get('/', ['uses' => 'App\Http\Controllers\HomeController@index']);

Route::get('/all', ['uses' => 'App\Http\Controllers\HomeController@allquery']);
Route::get('/search/results/{query}', ['uses' => 'App\Http\Controllers\HomeController@searchresults']);
Route::get('/category/{category_id}', ['uses' => 'App\Http\Controllers\HomeController@category']);
Route::get('/question/{question_id}', ['uses' => 'App\Http\Controllers\HomeController@question']);
Route::post('/recommend', ['uses' => 'App\Http\Controllers\HomeController@recommend']);



Route::post('/search/query', ['uses' => 'App\Http\Controllers\HomeController@search']);
Route::get('/search/query', ['uses' => 'App\Http\Controllers\HomeController@search']);


Route::get('/admin', ['uses' => 'App\Http\Controllers\Admin\DashboardController@index']);
Route::get('/admin/categories', ['uses' => 'App\Http\Controllers\Admin\CategoryController@show']);
Route::get('/admin/categories/edit', ['uses' => 'App\Http\Controllers\Admin\CategoryController@edit']);
Route::get('/admin/categories/edit/{edit_id}', ['uses' => 'App\Http\Controllers\Admin\CategoryController@edit']);
Route::post('/admin/categories/edit', ['uses' => 'App\Http\Controllers\Admin\CategoryController@save']);
Route::get('/admin/categories/delete/{del_id}', ['uses' => 'App\Http\Controllers\Admin\CategoryController@delete']);

Route::post('/admin/categories/iconupload', ['uses' => 'App\Http\Controllers\Admin\CategoryController@iconupload']);

Auth::routes();

Route::get('/admin/questions', ['uses' => 'App\Http\Controllers\Admin\QuestionController@show']);
Route::post('/admin/questions', ['uses' => 'App\Http\Controllers\Admin\QuestionController@show']);
Route::get('/admin/questions/edit', ['uses' => 'App\Http\Controllers\Admin\QuestionController@edit']);
Route::get('/admin/questions/edit/{edit_id}', ['uses' => 'App\Http\Controllers\Admin\QuestionController@edit']);
Route::post('/admin/questions/edit', ['uses' => 'App\Http\Controllers\Admin\QuestionController@save']);
Route::get('/admin/questions/delete/{del_id}', ['uses' => 'App\Http\Controllers\Admin\QuestionController@delete']);

//Route::get('/admin/security', ['uses' => 'App\Http\Controllers\Admin\SecurityController@index']);
//Route::post('/admin/security', ['uses' => 'App\Http\Controllers\Admin\SecurityController@index']);
