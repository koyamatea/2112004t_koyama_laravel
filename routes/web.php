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
    return view('welcome');
});

// CREATE TABLE `storycoments` (->name('login')
//     `id` varchar(255) DEFAULT NULL,
//     `title` varchar(255) DEFAULT NULL,
//     `story` varchar(255) DEFAULT NULL,
//     `coment` varchar(255) DEFAULT NULL,
//     `created_at` timestamp NOT NULL DEFAULT current_timestamp()
//   );

Route::get('/example', 'ExampleController@index'); // 追加
Route::get('/users/list', 'ArticleController@list')->name('Article.list');
Route::get('/users/add', 'ArticleController@add')->name('Article.add');
Route::post('/users/store', 'ArticleController@store')->name('Article.store');
Route::get('/users/login', 'ArticleController@login')->name('Article.login');
Route::get('/users/home', 'ArticleController@home')->name('Article.home');
Route::post('/users/home', 'ArticleController@home')->name('Article.home');
Route::get('/users/touroku', 'ArticleController@touroku')->name('Article.touroku');
Route::post('/users/touroku2', 'ArticleController@touroku2')->name('Article.touroku2');
Route::get('/users/news', 'ArticleController@news')->name('Article.news');
Route::get('/users/{id}/mod', 'ArticleController@mod')->name('Article.mod');
Route::get('/users/logout', 'ArticleController@logout')->name('Article.logout');
Route::get('/users/{edit_title}/edit', 'ArticleController@edit')->name('Article.edit');
Route::get('/users/{edit_title}/delete', 'ArticleController@delete')->name('Article.delete');
Route::get('/users/{id}/edit2', 'ArticleController@edit2')->name('Article.edit2');
Route::get('/users/{id}/delete2', 'ArticleController@delete2')->name('Article.delete2');
Route::get('/users/{id}/forcoment', 'ArticleController@forcoment')->name('Article.forcoment');
Route::get('/users/love', 'ArticleController@love')->name('loveer');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
