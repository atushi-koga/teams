<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterUserTest extends TestCase
{
    /**
     * 新規ユーザ登録画面が表示される事を確認
     *
     * @return void
     */
    public function testCanDisplayRegisterForm()
    {
        $response = $this->get('/register');

        $response->assertStatus(200)
                 ->assertViewIs('auth.register');
    }

    /**
     * 新規ユーザが登録される事を確認
     */
    public function testCanRegisterUser()
    {
        $this->post('/register', [
            'name'                  => '',
            'email'                 => '',
            'password'              => '',
            'password_confirmation' => '',
        ])->assertViewIs('');

        $this->assertDatabaseHas('users', [
            'name'                  => '',
            'email'                 => '',
        ]);
    }
}
