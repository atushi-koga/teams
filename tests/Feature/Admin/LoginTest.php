<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * 管理者ユーザのログインに関するテストケース
 *
 * @package Tests\Feature\Admin
 */
class LoginTest extends TestCase
{
    /**
     * ログイン画面が表示される事を確認する
     *
     * @return void
     */
    public function testCanDisplayLoginForm()
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
    }
}
