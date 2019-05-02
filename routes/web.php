<?php

Route::get('/', 'TopController@showTop');

Route::get('login', 'Auth\LoginController@showLoginForm')
    ->name('showLoginForm');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')
    ->name('showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register')
     ->name('register');
Route::get('register/complete', 'Auth\RegisterController@showComplete')
     ->name('register.showComplete');

Route::group(['prefix' => 'my-page', 'middleware' => 'auth'], function(){
    Route::get('/', 'MyPage\TopController@showTop')
         ->name('my-page.top');
    Route::get('logout', 'MyPage\TopController@logout')
         ->name('my-page.logout');
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
