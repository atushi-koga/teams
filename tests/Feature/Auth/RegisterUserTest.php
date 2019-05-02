<?php

namespace Tests\Feature\Auth;

use App\Eloquent\EloquentPrefecture;
use App\Eloquent\EloquentUser;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->setInitData();
    }

    /**
     * 新規ユーザ登録画面が表示される事を確認
     *
     * @return void
     */
    public function testCanDisplayRegisterForm()
    {
        $response = $this->get('/register');

        $response->assertStatus(200)
                 ->assertViewIs('auth.register.form');
    }

    /**
     * 新規ユーザ情報を正常にDB登録し認証済みになる事を確認
     */
    public function testCanRegisterUser()
    {
        $this->post(
            '/register', [
                'nickname'              => 'test user',
                'prefecture_id'         => '1',
                'gender'                => '1',
                'birth_year'            => '1989',
                'birth_month'           => '7',
                'birth_day'             => '10',
                'email'                 => 'test@gmail.com',
                'password'              => 'abcd1234',
                'password_confirmation' => 'abcd1234',
            ]
        )
             ->assertRedirect('/register/complete');

        $this->assertDatabaseHas(
            'users', [
                'nickname' => 'test user',
                'email'    => 'test@gmail.com',
            ]
        );

        $user = EloquentUser::where('email', 'test@gmail.com')
                            ->first();
        $this->assertAuthenticatedAs($user);
    }
}
