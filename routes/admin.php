<?php

Route::group(['prefix' => 'login'],function(){
    Route::get('/', 'LoginController@showLogin')
        ->name('showLogin');
    Route::get('redirect-to-provider', 'LoginController@redirectToProvider')
         ->name('login.redirectToProvider');
    Route::get('handle-provider-callback', 'LoginController@handleProviderCallback')
         ->name('login.handleProviderCallback');
});
Route::get('logout', 'LoginController@logout')
     ->name('logout');

// @todo: ユーザ認証ミドルウェアを追加する
Route::group(['prefix' => 'my-page',],function(){
//    Route::get('/', 'MypageController@showTop')
//         ->name('my-page.showTop');

    /**
     * 新規チーム登録
     */
//    Route::group(['prefix' => 'new-team'], function(){
//        Route::get('/', 'NewTeamController@showForm')
//             ->name('new-team.showForm');
//        Route::post('/', 'NewTeamController@create')
//             ->name('new-team.create');
//    });
});
