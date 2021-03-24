<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', 'PageController@index');
Route::get('/about', 'PageController@about');

Route::resource('posts','PostsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
