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

Route::get('/', 'HomeController@index');
Route::name('articles')->group(function () {
    Route::get('articles', 'ArticlesController@index');
    Route::get('article/{id}', 'ArticleController@index');
});
Route::get('admin/articles', 'AdminArticlesController@index')->middleware('auth');
Route::get('admin/article/{id}', 'AdminArticleController@index')->middleware('auth');
Route::post('admin/article/{id}', 'AdminArticleController@update')->middleware('auth');
Route::get('admin/new_article', 'AdminArticleController@create')->middleware('auth');
Route::post('admin/new_article', 'AdminArticleController@store')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/projets', 'ProjectsController@index');
Route::get('/projet/{id}', 'ProjectController@index');
