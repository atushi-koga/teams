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
}
