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
    Route::get('article/{id}-{title}', 'ArticlesController@show');
});

//ADMIN ARTICLES
Route::get('admin/articles', 'AdminArticleController@index')->middleware('auth');
Route::get('admin/article/{id}', 'AdminArticleController@show')->middleware('auth');
Route::post('admin/article/{id}', 'AdminArticleController@update')->middleware('auth');
Route::get('admin/new_article', 'AdminArticleController@create')->middleware('auth');
Route::post('admin/new_article', 'AdminArticleController@store')->middleware('auth');
Route::delete('admin/delete_article/{id}', 'AdminArticleController@destroy')->middleware('auth');

//ADMIN CATEGORIES
Route::get('admin/categories', 'AdminCategoryController@index')->middleware('auth');
Route::get('admin/category/{id}', 'AdminCategoryController@show')->middleware('auth');
Route::post('admin/category/{id}', 'AdminCategoryController@update')->middleware('auth');
Route::get('admin/new_category', 'AdminCategoryController@create')->middleware('auth');
Route::post('admin/new_category', 'AdminCategoryController@store')->middleware('auth');
Route::get('admin/delete_category/{id}', "AdminCategoryController@destroy")->middleware('auth');

//ADMIN EQUIPE
Route::get('admin/equipes', 'AdminEquipeController@index')->middleware('auth');
Route::get('admin/equipe/{id}', 'AdminEquipeController@show')->middleware('auth');
Route::post('admin/equipe/{id}', 'AdminEquipeController@update')->middleware('auth');
Route::get('admin/new_equipe', 'AdminEquipeController@create')->middleware('auth');
Route::post('admin/new_equipe', 'AdminEquipeController@store')->middleware('auth');
Route::delete('admin/delete_equipe/{id}', 'AdminEquipeController@destroy')->middleware('auth');

Auth::routes();

Route::get('/projets', 'ProjectsController@index');
Route::get('/projet/{id}-{title}', 'ProjectsController@show');
Route::get('/equipe', 'EquipeController@index');
Route::get('/partenaires', 'PartenairesController@index');
