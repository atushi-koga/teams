<?php
declare(strict_types=1);

namespace packages\Infrustructure\User;

use App\Eloquent\EloquentUser;
use Carbon\Carbon;
use packages\Domain\Domain\Common\Prefecture;
use packages\Domain\Domain\User\BirthDay;
use packages\Domain\Domain\User\Email;
use packages\Domain\Domain\User\Gender;
use packages\Domain\Domain\User\Password;
use packages\Domain\Domain\User\User;
use packages\Domain\Domain\User\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    /**
     * 新規会員を登録
     *
     * @param User $user
     * @return User
     */
    public function create(User $user): User
    {
        $record = EloquentUser::query()
                              ->create(
                                  [
                                      'nickname'      => $user->getNickName(),
                                      'gender'        => $user->getGenderKey(),
                                      'prefecture_id' => $user->getPrefectureKey(),
                                      'birthday'      => $user->getBirthDate(),
                                      'email'         => $user->getEmail(),
                                      'password'      => $user->getPassword(),
                                      'created_at'    => Carbon::now(),
                                  ]
                              );

        $created_user = new User(
            $record->nickname,
            Prefecture::of($record->prefecture_id),
            Gender::of($record->gender),
            BirthDay::of($record->birthday),
            Email::of($record->email),
            Password::of($record->password)
        );
        $created_user->setId($record->id);

        return $created_user;
    }
}
