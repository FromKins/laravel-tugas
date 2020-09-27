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



Route::get('/', function () {
    return view('home');
});
Route::get('dashboard', function () {
    return view('/dashboard.index');
});


Route::get('/managements','ManagementController@index');
Route::post('/managements/create','ManagementController@create');
Route::get('/managements/{id}/edit','ManagementController@edit');
Route::post('/managements/{id}/update','ManagementController@update');
Route::get('/managements/{id}/delete','ManagementController@delete');

Route::get('/dashboard', 'DashboardController@index');
Route::get('/categories', 'CategoriesController@index');
Route::post('/categories/create','CategoriesController@create');
Route::get('/categories/{id}/edit','CategoriesController@edit');
Route::post('/categories/{id}/update','CategoriesController@update');
Route::get('/categories/{id}/delete','CategoriesController@delete');

Route::get('/articles', 'ArticleController@index');
Route::post('/articles/create','articleController@create');
Route::get('/articles/{id}/edit','ArticleController@edit');
Route::post('/articles/{id}/update','ArticleController@update');
Route::get('/articles/{id}/delete','ArticleController@delete');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
