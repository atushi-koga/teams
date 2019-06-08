<?php

namespace App\Eloquent;

use App\Notifications\ResetPasswordJaNotification;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use packages\Domain\Domain\User\User;

class EloquentUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $guarded = [];

    protected $dates = [
        'birthday',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordJaNotification($token));
    }


    public function toModel(): User
    {
        $attributes = $this->attributesToArray();
        if (isset($this->password)) {
            $attributes['password'] = $this->password;
        }

        return User::ofByArray($attributes);
    }
}
