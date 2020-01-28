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
	// article routes
    Route::get('article/index', 'ArticleController@index')->name('admin.article.index');
    Route::get('article/edit/{id}', 'ArticleController@edit')->name('admin.article.edit');
    Route::post('article/update/{id}', 'ArticleController@update')->name('admin.article.update');
    Route::get('article/show/{id}', 'ArticleController@show')->name('admin.article.show');
    Route::get('article/destroy/{id}', 'ArticleController@destroy')->name('admin.article.destroy');
    Route::get('article/create', 'ArticleController@create')->name('admin.article.create');
    Route::post('article/store', 'ArticleController@store')->name('admin.article.store');
    Route::get('article/images/{id}', 'ArticleController@images')->name('admin.article.images');

    // Journals routes
    Route::get('journal/index', 'JournalController@index')->name('admin.journal.index');
    Route::get('journal/edit/{id}', 'JournalController@edit')->name('admin.journal.edit');
    Route::post('journal/update/{id}', 'JournalController@update')->name('admin.journal.update');
    Route::get('journal/show/{id}', 'JournalController@show')->name('admin.journal.show');
    Route::get('journal/destroy/{id}', 'JournalController@destroy')->name('admin.journal.destroy');
    Route::get('journal/create', 'JournalController@create')->name('admin.journal.create');
    Route::post('journal/store', 'JournalController@store')->name('admin.journal.store');
    Route::get('journal/images/{id}', 'JournalController@images')->name('admin.journal.images');
});



