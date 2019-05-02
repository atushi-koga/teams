<?php

Route::get('/', 'TopController@showTop');

Route::get('login', 'Auth\LoginController@showLoginForm')
    ->name('showLoginForm');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')
    ->name('showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register')
     ->name('register');

Route::get('my-page', 'MyPage\TopController@showTop')
    ->name('my-page.top');
Route::get('my-page/logout', 'MyPage\TopController@logout')
     ->name('my-page.logout');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
