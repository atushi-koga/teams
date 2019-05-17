<?php

namespace Tests;

use App\Eloquent\EloquentUser;
use Artisan;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * ユーザを生成し、セッションにユーザ情報を保持する
     *
     * @return EloquentUser
     */
    public function login(): EloquentUser
    {
        $user = factory(EloquentUser::class)->create();

        $this->actingAs($user);

        return $user;
    }

    public function setInitData()
    {
        Artisan::call('migrate:refresh', ['--seed' => true]);
    }
}
