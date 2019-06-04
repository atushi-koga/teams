<?php

namespace App\Notifications;

use App\Mail\ResetPasswordMail;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Mail;

/**
 * パスワードリセットメールを日本語で送信するクラス
 * Laravelデフォルトの Illuminate\Auth\Notifications\ResetPassword では、
 * 英語でしか送れないため、このクラスを使用している
 *
 * @package App\Notifications
 */
class ResetPasswordJaNotification extends Notification
{
    use Queueable;

    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * Create a notification instance.
     *
     * @param  string $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return ResetPasswordMail
     */
    public function toMail($notifiable)
    {
        return (new ResetPasswordMail($this->token, $notifiable->nickname))
            ->text('auth.passwords.reset_email_plain')
            ->from(config('mail.from.address'))
            ->to($notifiable->email)
            ->subject('パスワード再設定');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
