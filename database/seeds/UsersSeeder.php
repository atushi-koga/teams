<?php

use App\Eloquent\EloquentUser;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use packages\Domain\Domain\Common\Prefecture;
use packages\Domain\Domain\User\BirthDay;
use packages\Domain\Domain\User\Email;
use packages\Domain\Domain\User\Gender;
use packages\Domain\Domain\User\Password;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EloquentUser::query()
                    ->insert(
                        [
                            [
                                'nickname'          => 'test user1',
                                'gender'            => Gender::of(1)
                                                             ->getKey(),
                                'prefecture'        => Prefecture::of(1)
                                                                 ->getKey(),
                                'birthday'          => BirthDay::of(Carbon::parse('1989-7-10'))
                                                               ->getFormatBirthDate(),
                                'email'             => Email::of('test1@gmail.com')
                                                            ->getValue(),
                                'email_verified_at' => Carbon::now(),
                                'password'          => Password::ofRowPassword('11111111')
                                                               ->getHash(),
                                'created_at'        => Carbon::now(),
                            ],
                            [
                                'nickname'          => 'test user2',
                                'gender'            => Gender::of(2)
                                                             ->getKey(),
                                'prefecture'        => Prefecture::of(2)
                                                                 ->getKey(),
                                'birthday'          => BirthDay::of(Carbon::parse('1989-7-11'))
                                                               ->getFormatBirthDate(),
                                'email'             => Email::of('test2@gmail.com')
                                                            ->getValue(),
                                'email_verified_at' => null,
                                'password'          => Password::ofRowPassword('22222222')
                                                               ->getHash(),
                                'created_at'        => Carbon::now(),
                            ]
                        ]
                    );
    }
}
