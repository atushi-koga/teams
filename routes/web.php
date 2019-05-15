<?php

Route::get('/', 'TopController@showTop')
     ->name('top');

/**
 * 新規会員登録
 */
Route::group(
    ['prefix' => 'register'], function () {
    Route::get('/', 'Auth\RegisterController@showRegistrationForm')
         ->name('showRegistrationForm');
    Route::post('/', 'Auth\RegisterController@register')
         ->name('register');
    Route::get('complete', 'Auth\RegisterController@showComplete')
         ->name('register.showComplete');
}
);

/**
 * ログイン
 */
Route::group(
    ['prefix' => 'login'], function () {
    Route::get('/', 'Auth\LoginController@showLoginForm')
         ->name('showLoginForm');
    Route::post('/', 'Auth\LoginController@login')
         ->name('login');
}
);

/**
 * マイページ
 */
Route::group(['prefix' => 'my-page', 'middleware' => 'auth'], function () {
    Route::get('/', 'MyPage\TopController@showTop')
         ->name('my-page.top');
    Route::get('logout', 'MyPage\TopController@logout')
         ->name('my-page.logout');

    /**
     * 参加申込情報
     */
    Route::get('attend/list', 'MyPage\AttendController@list')
         ->name('attend.list');

    /**
     * 募集内容登録
     */
    Route::group(['prefix' => '/new-recruitment'], function () {
        Route::get('/', 'MyPage\NewRecruitmentController@showForm')
             ->name('new-recruitment.showForm');
        Route::post('/', 'MyPage\NewRecruitmentController@create')
             ->name('new-recruitment.create');
    });

    Route::group(['prefix' => 'recruitment/{id}'], function () {
        Route::get('/', 'MyPage\DetailRecruitmentController@detail')
             ->name('detail-recruitment.detail');
        Route::get('join', 'MyPage\JoinController@showConf')
             ->name('attend-recruitment.showConf');
        Route::post('join', 'MyPage\JoinController@join')
             ->name('attend-recruitment.join');
        Route::get('join/finish', 'MyPage\JoinController@showFinish')
             ->name('attend-recruitment.finish');
    });
}
);

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
