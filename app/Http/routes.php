<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'IndexController@index')->middleware('guest')->name('index_index');
    Route::get('/news', 'NewsController@index')->middleware('guest')->name('news_index');
    Route::get('/tags', 'TagsController@index')->middleware('guest')->name('tags_index');
    Route::get('/news/{slug}', 'NewsController@view')->middleware('guest')->name('view_news');
    Route::get('/tags/{slug}', 'TagsController@view')->middleware('guest')->name('view_tag');

    /**
     * Admin panel
     */
    Route::get('/admin', 'AdminController@index')->middleware('auth')->name('admin_index');
    Route::get('/admin/news', 'AdminController@view')->middleware('auth')->name('admin_news');
    Route::get('/admin/tags', 'AdminController@view')->middleware('auth')->name('admin_tags');
    Route::get('/admin/news/save', 'AdminController@store')->middleware('auth')->name('admin_save');

    Route::get('/tasks', 'TaskController@index');
    Route::post('/task', 'TaskController@store');
    Route::delete('/task/{task}', 'TaskController@destroy');

    Route::auth();
});
