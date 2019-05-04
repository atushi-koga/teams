<?php

Route::get('/', 'TopController@showTop');

Route::group(['prefix' => 'login'], function(){
    Route::get('/', 'Auth\LoginController@showLoginForm')
         ->name('showLoginForm');
    Route::post('/', 'Auth\LoginController@login')
         ->name('login');
});


Route::group(['prefix' => 'register'], function(){
    Route::get('/', 'Auth\RegisterController@showRegistrationForm')
         ->name('showRegistrationForm');
    Route::post('/', 'Auth\RegisterController@register')
         ->name('register');
    Route::get('complete', 'Auth\RegisterController@showComplete')
         ->name('register.showComplete');
});

Route::group(['prefix' => 'my-page', 'middleware' => 'auth'], function(){
    Route::get('/', 'MyPage\TopController@showTop')
         ->name('my-page.top');
    Route::get('logout', 'MyPage\TopController@logout')
         ->name('my-page.logout');
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
