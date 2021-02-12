<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categories', 'CategoryController');

Route::resource('news', 'NewsController');
