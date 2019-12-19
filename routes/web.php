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


Route::namespace('backend')->prefix('admin')->middleware('admin')->group(function () {
    Route::get('home', 'home@index')->name('home.index');
    Route::get('users', 'Users@index')->name('users.index');
    Route::get('users/create', 'Users@create')->name('users.create');
    Route::post('users', 'Users@store')->name('users.store');
    Route::get('users/{id}/edit', 'Users@edit')->name('users.edit');
    Route::put('users/{id}', 'Users@update')->name('users.update');
    Route::delete('users/{id}', 'Users@destroy')->name('users.destroy');

    //

    Route::get('cats', 'categories@index')->name('cats.index');
    Route::get('cats/create', 'categories@create')->name('cats.create');
    Route::post('cats', 'categories@store')->name('cats.store');
    Route::get('cats/{id}/edit', 'categories@edit')->name('cats.edit');
    Route::put('cats/{id}', 'categories@update')->name('cats.update');
    Route::delete('cats/{id}', 'categories@destroy')->name('cats.destroy');
    
    //

    Route::get('skills', 'skills@index')->name('skills.index');
    Route::get('skills/create', 'skills@create')->name('skills.create');
    Route::post('skills', 'skills@store')->name('skills.store');
    Route::get('skills/{id}/edit', 'skills@edit')->name('skills.edit');
    Route::put('skills/{id}', 'skills@update')->name('skills.update');
    Route::delete('skills/{id}', 'skills@destroy')->name('skills.destroy');

        //

    Route::get('tags', 'tags@index')->name('tags.index');
    Route::get('tags/create', 'tags@create')->name('tags.create');
    Route::post('tags', 'tags@store')->name('tags.store');
    Route::get('tags/{id}/edit', 'tags@edit')->name('tags.edit');
    Route::put('tags/{id}', 'tags@update')->name('tags.update');
    Route::delete('tags/{id}', 'tags@destroy')->name('tags.destroy');

        //

    Route::get('pages', 'pages@index')->name('pages.index');
    Route::get('pages/create', 'pages@create')->name('pages.create');
    Route::post('pages', 'pages@store')->name('pages.store');
    Route::get('pages/{id}/edit', 'pages@edit')->name('pages.edit');
    Route::put('pages/{id}', 'pages@update')->name('pages.update');
    Route::delete('pages/{id}', 'pages@destroy')->name('pages.destroy');
    //
    Route::get('messages', 'Massages@index')->name('messages.index');
    Route::get('messages/create', 'Massages@create')->name('messages.create');
    Route::post('messages', 'Massages@store')->name('messages.store');
    Route::get('messages/{id}/edit', 'Massages@edit')->name('messages.edit');
    Route::put('messages/{id}', 'Massages@update')->name('messages.update');
    Route::delete('messages/{id}', 'Massages@destroy')->name('messages.destroy');

    //
    Route::put('messages/replay/{id}', 'Massages@replay')->name('message.replay');

    Route::get('videos', 'videos@index')->name('videos.index');
    Route::get('videos/create', 'videos@create')->name('videos.create');
    Route::post('videos', 'videos@store')->name('videos.store');
    Route::get('videos/{id}/edit', 'videos@edit')->name('videos.edit');
    Route::put('videos/{id}', 'videos@update')->name('videos.update');
    Route::delete('videos/{id}', 'videos@destroy')->name('videos.destroy');

    Route::post('comments', 'videos@commentStore')->name('comments.store');
    Route::delete('comments/{id}', 'videos@commentDelete')->name('comment.delete');
    Route::put('comments/{id}', 'videos@commentUpdate')->name('comment.update');
});
Route::get('/', 'dashbordController@welcome')->name('frontend.landing');


Auth::routes();



Route::get('/dashbord', 'dashbordController@index')->name('dashbord');
Route::get('category/{id}', 'dashbordController@category')->name('front.category');
Route::get('skill/{id}', 'dashbordController@skills')->name('front.skill');
Route::get('tag/{id}', 'dashbordController@skills')->name('front.tags');
Route::get('video/{id}', 'dashbordController@video')->name('frontend.video');
Route::get('contact-us', 'dashbordController@messageStore')->name('contact.store');
Route::get('page/{id}/{slug?}', 'dashbordController@page')->name('front.page');
Route::get('profile/{id}/{slug?}', 'dashbordController@profile')->name('front.profile');

Route::middleware('auth')->group(function () {
    Route::put('comments/{id}', 'dashbordController@commentUpdate')->name('front.commentUpdate');
    Route::post('comments/{id}/create', 'dashbordController@commentStore')->name('front.commentStore');
    Route::post('profile', 'dashbordController@profileUpdate')->name('profile.update');
});
