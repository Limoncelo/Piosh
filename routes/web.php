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
    return view('home');
});
Route::name('articles')->group(function () {
    Route::get('articles', 'ArticlesController@index');
    Route::get('article/{id}', 'ArticleController@index');
});
Route::get('admin/articles', 'AdminArticlesController@index')->middleware('auth');
Route::get('admin/article/{id}', 'AdminArticleController@index')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
