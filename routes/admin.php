<?php

Route::group(['prefix' => 'login'],function(){
    Route::get('/', 'LoginController@showLogin')
        ->name('showLogin');
//    Route::get('/', 'LoginController@showLogin')
//         ->name('');
});
Route::get('logout', 'LoginController@logout')
     ->name('logout');

// @todo: ユーザ認証ミドルウェアを追加する
Route::group(['prefix' => 'my-page',],function(){
    Route::get('/', 'MypageController@index')
         ->name('my-page.index');

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
