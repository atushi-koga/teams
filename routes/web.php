<?php

Route::get('/', 'TopController@showTop');

Route::get('login', 'Auth\LoginController@showLoginForm')
    ->name('showLoginForm');
//Route::get('register-user', 'TopController@showTop');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
