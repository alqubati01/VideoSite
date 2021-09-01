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

//Route::get('admin/home', 'backEnd\HomeController@index');
Route::namespace('backEnd')->prefix('admin')->middleware('admin')->group(function() {
    Route::get('home', 'HomeController@index')->name('admin.home');

//    Route::get('/users', 'UsersController@index')->name('users.index');
//    Route::post('/users', 'UsersController@store')->name('users.store');
//    Route::get('/users/create', 'UsersController@create')->name('users.create');
//    Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
//    Route::put('/users/{user}', 'UsersController@update')->name('users.update');
//    Route::delete('/users/delete/{user}', 'UsersController@destroy')->name('users.destroy');

    Route::resource('users', 'UsersController')->except('show');

    Route::resource('categories', 'CategoriesController')->except('show');

    Route::resource('skills', 'SkillsController')->except('show');

    Route::resource('tags', 'TagsController')->except('show');

    Route::resource('pages', 'PagesController')->except('show');

    Route::resource('videos', 'VideosController')->except('show');

    Route::post('comments', 'VideosController@commentStore')->name('comment.store');
    Route::put('comments/{id}', 'VideosController@commentUpdate')->name('comment.update');
    Route::delete('comments/{id}', 'VideosController@commentDelete')->name('comment.delete');

    Route::resource('messages', 'MessagesController')->only(['index' , 'destroy' , 'edit']);
    Route::post('messages/replay/{id}', 'MessagesController@replay')->name('message.replay');
});

Auth::routes();

Route::get('/', 'HomeController@welcome')->name('front.landing');
Route::get('home', 'HomeController@index')->name('home');
Route::get('category/{id}', 'HomeController@category')->name('front.category');
Route::get('skill/{id}', 'HomeController@skill')->name('front.skill');
Route::get('tag/{id}', 'HomeController@tag')->name('front.tag');
Route::get('video/{id}', 'HomeController@video')->name('front.video');
Route::get('contact-us', 'HomeController@messageStore')->name('contact.store');
Route::get('page/{id}/{slug?}', 'HomeController@page')->name('front.page');
Route::get('profile/{id}/{slug?}', 'HomeController@profile')->name('front.profile');

Route::middleware('auth')->group(function () {
    Route::put('comments/{id}', 'HomeController@commentUpdate')->name('front.commentUpdate');
    Route::post('comments/{id}/create', 'HomeController@commentStore')->name('front.commentStore');
    Route::post('profile', 'HomeController@profileUpdate')->name('profile.update');
});
