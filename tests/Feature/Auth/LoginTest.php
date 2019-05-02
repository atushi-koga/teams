<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * ログイン画面が表示される事を確認
     *
     * @return void
     */
    public function testCanDisplayLoginForm()
    {
        $response = $this->get('/login');

        $response->assertStatus(200)
            ->assertViewIs('auth.login');
    }

    /**
     * ログイントップは未認証では表示されず、
     * ログイン画面にリダイレクトされる事を確認
     */
    public function testCanNotDisplayWithoutAuth()
    {
        $response = $this->get('/my-page');

        $response->assertRedirect('/login');
    }
}
