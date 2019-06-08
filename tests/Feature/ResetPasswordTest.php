<?php

namespace Tests\Feature;

use App\Eloquent\EloquentUser;
use App\Mail\ResetPasswordMail;
use App\Notifications\ResetPasswordJaNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResetPasswordTest extends TestCase
{
    use RefreshDatabase;

    public function testCanDisplaySubmitMailForm()
    {
        $this->get('/password/request')
             ->assertStatus(200);
    }

    public function testCanSubmitResetMailToUser()
    {
        $user = $this->createTestUser();

        Notification::fake();
        $response = $this->from('/password/request')
                         ->post('/password/request', [
                             'email' => $user->email,
                         ]);

        Notification::assertSentTo(
            [$user], ResetPasswordJaNotification::class
        );
        $response->assertRedirect('/password/request')
                 ->assertSessionHas('status', 'メールを送信しました');
    }

    public function testCanNotSubmitResetMailToNotRegisteredUser()
    {
        $user = $this->createTestUser();

        Notification::fake();
        $response = $this->from('/password/request')
                         ->post('/password/request', [
                             'email' => 'testtest@gmail.com',   // 存在しないユーザのメールアドレス
                         ]);

        Notification::assertNotSentTo(
            [$user], ResetPasswordJaNotification::class
        );
        $response->assertRedirect('/password/request')
                 ->assertSessionHas('status', 'メールを送信しました');
    }

    public function createTestUser(): EloquentUser
    {
        return factory(EloquentUser::class)->create([
            'email_verified_at' => null,
        ]);
    }

}
