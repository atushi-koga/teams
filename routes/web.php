<?php

Route::get('/', 'TopController@showTop')
     ->name('top');
Route::get('/recruitment/{id}', 'TopController@detailRecruitment')
     ->name('detail-recruitment');

/**
 * 新規会員登録
 */
Route::group(['prefix' => 'register'], function () {
    Route::get('/', 'Auth\RegisterController@showRegistrationForm')
         ->name('showRegistrationForm');
    Route::post('/', 'Auth\RegisterController@register')
         ->name('register');
    Route::get('complete', 'Auth\RegisterController@showComplete')
         ->name('register.showComplete');
});

/**
 * ログイン
 */
Route::group(['prefix' => 'login'], function () {
    Route::get('/', 'Auth\LoginController@showLoginForm')
         ->name('showLoginForm');
    Route::post('/', 'Auth\LoginController@login')
         ->name('login');
});

/**
 * マイページ
 */
Route::group(['middleware' => 'auth'], function () {
    /**
     * アカウント情報詳細・編集
     */
    Route::group(['prefix' => 'account'], function () {
        Route::get('/logout', 'MyPage\AccountController@logout')
             ->name('account.logout');
        Route::get('/', 'MyPage\AccountController@detail')
             ->name('account.detail');
        Route::group(['prefix' => 'edit'], function () {
            Route::get('/', 'MyPage\AccountController@shoEditForm')
                 ->name('account.shoEditForm');
            Route::post('/', 'MyPage\AccountController@edit')
                 ->name('account.edit');
            Route::get('/finish', 'MyPage\AccountController@showEditFinish')
                 ->name('account.showEditFinish');
        });
    });

    /**
     * ユーザ情報
     */
    Route::group(['prefix' => 'user/{id}'], function () {
        Route::get('/', 'MyPage\UserController@profile')
             ->name('user.profile');
    });
    /**
     * 参加申込情報
     */
    Route::group(['prefix' => 'attend/list'], function () {
        Route::get('/', 'MyPage\AttendController@list')
             ->name('attend.list');
        Route::post('/{id}/cancel', 'MyPage\AttendController@cancel')
             ->name('attend.cancel');
    });
    /**
     * 募集内容登録
     */
    Route::group(['prefix' => '/new-recruitment'], function () {
        Route::get('/', 'MyPage\NewRecruitmentController@showForm')
             ->name('new-recruitment.showForm');
        Route::post('/', 'MyPage\NewRecruitmentController@create')
             ->name('new-recruitment.create');
    });
    /**
     * イベント、参加者管理
     */
    Route::group(['prefix' => 'manage'], function () {
        // イベント一覧、作成、編集、削除
        Route::group(['prefix' => 'event'], function () {
            Route::get('/', 'MyPage\ManageEventController@list')
                 ->name('manage-event.list');
            Route::get('create', 'MyPage\ManageEventController@createForm')
                 ->name('manage-event.createForm');
            Route::post('create', 'MyPage\ManageEventController@create')
                 ->name('manage-event.create');
            Route::get('create/finish', 'MyPage\ManageEventController@createFinish')
                 ->name('manage-event.createFinish');
            Route::get('edit/{id}', 'MyPage\ManageEventController@editForm')
                 ->name('manage-event.editForm');
            Route::post('edit/{id}', 'MyPage\ManageEventController@edit')
                 ->name('manage-event.edit');
            Route::get('edit/{id}/finish', 'MyPage\ManageEventController@editFinish')
                 ->name('manage-event.editFinish');
            Route::post('remove/{id}', 'MyPage\ManageEventController@remove')
                 ->name('manage-event.remove');
        });
        /**
         * 参加者一覧、参加承認
         */
        Route::group(['prefix' => 'attend/event/{id}'], function () {
            Route::get('/', 'ManageAttendController@list')
                 ->name('manage-attend.list');
            Route::post('accept/{user-id}', 'ManageAttendController@accept')
                 ->name('manage-attend.accept');
            Route::post('not-accept/{user-id}', 'ManageAttendController@notAccept')
                 ->name('manage-attend.not-accept');
        });
    });
    /**
     * 参加確認、参加申込、参加完了
     */
    Route::group(['prefix' => 'recruitment/{id}'], function () {
        Route::get('join', 'MyPage\JoinController@showConf')
             ->name('attend-recruitment.showConf');
        Route::post('join', 'MyPage\JoinController@join')
             ->name('attend-recruitment.join');
        Route::get('join/finish', 'MyPage\JoinController@showFinish')
             ->name('attend-recruitment.finish');
    });
});
