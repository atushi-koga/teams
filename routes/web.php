<?php

Route::get('/', 'TopController@showTop');

Route::get('login', 'Auth\LoginController@showLoginForm')
    ->name('showLoginForm');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')
    ->name('showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register')
     ->name('register');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
