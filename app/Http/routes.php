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

    Route::get('/', 'IndexController@index')->middleware('guest')->name('index');

    /**
     * Auto
     */
    Route::get('/trainer/search', 'TrainerController@search')->middleware('guest')->name('search_trainer');
    Route::get('/trainer/{slug}', 'TrainerController@view')->middleware('guest')->name('view_trainer');
    Route::get('/trainers/search', 'TrainerController@search')->middleware('guest')->name('search_trainers');
    Route::get('/car/{slug}', 'CarsController@view')->middleware('guest')->name('view_car');
    Route::get('/tags', 'TagsController@index')->middleware('guest')->name('tags_index');
    Route::get('/tags/{slug}', 'TagsController@view')->middleware('guest')->name('view_tag');

    /**
     * News
     */
    Route::get('/news', 'NewsController@index')->middleware('guest')->name('news_index');
    Route::get('/news/{slug}', 'NewsController@view')->middleware('guest')->name('view_news');

    /**
     * Users
     */
    Route::get('/user/profile', 'UserController@profile')->middleware('auth')->name('user_profile');

    /**
     * Parsers
     */
    Route::get('/parse/get-news', 'NewsController@getNews')->middleware('guest')->name('news_get');

    /**
     * Admin panel
     */
    Route::get('/admin', 'AdminController@index')->middleware('auth')->name('admin_index');
    Route::get('/admin/news', 'AdminController@view')->middleware('auth')->name('admin_news');
    Route::get('/admin/tags', 'AdminController@view')->middleware('auth')->name('admin_tags');
    Route::get('/admin/news/save', 'AdminController@store')->middleware('auth')->name('admin_save');

    /**
     * Articles
     */
    Route::post('/article/', 'ArticlesController@store')->middleware('auth')->name('article_store');
    Route::post('/article/{slug}', 'ArticlesController@store')->middleware('auth')->name('article_from');

    Route::post('/comment/', 'CommentsController@store')->middleware('auth')->name('store_comment');
    /**
     * Tasks
     */
//    Route::get('/tasks', 'TaskController@index');
//    Route::post('/task', 'TaskController@store');
//    Route::delete('/task/{task}', 'TaskController@destroy');

    /**
     * Auth
     */
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::auth();
});
