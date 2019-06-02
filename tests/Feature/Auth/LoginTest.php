<?php

namespace Tests\Feature\Auth;

use App\Eloquent\EloquentUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use packages\Domain\Domain\User\Password;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * ログイン画面が表示される事を確認
     *
     * @return void
     */
    public function testCanDisplayLoginForm()
    {
        $this->get('/login')
             ->assertStatus(200)
             ->assertViewIs('auth.login');
    }

    /**
     * 未認証ではマイページトップ画面は表示されず、
     * ログイン画面にリダイレクトされる事を確認
     */
    public function testCanNotDisplayWithoutAuth()
    {
        $this->get('/account')
             ->assertRedirect('/login');
    }

    /**
     * 登録済みユーザが正常にログインできる事を確認
     */
    public function testCanLogin()
    {
        $rowPass = '11111111';
        $user    = factory(EloquentUser::class)->create([
            'password' => Password::ofRowPassword($rowPass)
                                  ->getHash(),
        ]);

        $this->post('/login', [
            'email'    => $user->email,
            'password' => $rowPass,
        ])
             ->assertRedirect('/');
    }

    /**
     * 登録済みユーザがパスワードを間違えた場合、正常にログインできない事を確認
     */
    public function testCanNotLogin()
    {
        $user = factory(EloquentUser::class)->create([
            'password' => Password::ofRowPassword('11111111')
                                  ->getHash(),
        ]);

        $this->from('/login')
             ->post('/login', [
                 'email'    => $user->email,
                 'password' => '11111112',
             ])
             ->assertRedirect('/login');
    }
}
