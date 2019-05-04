<?php

use App\Eloquent\EloquentUser;
use Faker\Generator as Faker;
use Carbon\Carbon;
use packages\Domain\Domain\Common\Prefecture;
use packages\Domain\Domain\User\BirthDay;
use packages\Domain\Domain\User\Email;
use packages\Domain\Domain\User\Gender;
use packages\Domain\Domain\User\Password;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(
    EloquentUser::class, function (Faker $faker) {
    return [
        'nickname'          => $faker->name,
        'gender'            => Gender::of(1)
                                     ->getKey(),
        'prefecture'        => Prefecture::of(1)
                                         ->getKey(),
        'birthday'          => BirthDay::of(Carbon::parse('1989-7-10'))
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
