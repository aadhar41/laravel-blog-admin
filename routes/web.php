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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('article/index', 'ArticleController@index')->name('admin.article.index');
    Route::get('article/edit/{id}', 'ArticleController@edit')->name('admin.article.edit');
    Route::post('article/update/{id}', 'ArticleController@update')->name('admin.article.update');
    Route::get('article/show/{id}', 'ArticleController@show')->name('admin.article.show');
    Route::get('article/destroy/{id}', 'ArticleController@destroy')->name('admin.article.destroy');
    Route::get('article/create', 'ArticleController@create')->name('admin.article.create');
    Route::post('article/store', 'ArticleController@store')->name('admin.article.store');
    Route::get('article/images/{id}', 'ArticleController@images')->name('admin.article.images');
});



