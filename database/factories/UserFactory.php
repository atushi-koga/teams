<?php

use App\Eloquent\EloquentUser;
use Faker\Generator as Faker;
use Carbon\Carbon;
use packages\Domain\Domain\Common\Prefecture;
use packages\Domain\Domain\User\BirthDay;
use packages\Domain\Domain\User\Email;
use packages\Domain\Domain\User\Gender;
use packages\Domain\Domain\User\Password;

$factory->define(EloquentUser::class, function (Faker $faker) {
    return [
        'nickname'          => mb_substr($faker->name, 0, 20),
        'gender'            => Gender::of(1)
                                     ->getKey(),
        'prefecture'        => Prefecture::of(1)
                                         ->getKey(),
        'birthday'          => BirthDay::ofFormat('1989-7-10')
                                       ->getFormatBirthDate(),
        'email'             => Email::of($faker->unique()->safeEmail)
                                    ->getValue(),
        'email_verified_at' => Carbon::now(),
        'password'          => Password::ofRowPassword('11111111')
                                       ->getHash(),
        'created_at'        => Carbon::now(),
    ];
}
);
