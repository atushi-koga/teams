<?php
declare(strict_types=1);

namespace packages\Infrustructure\User;

use App\Eloquent\EloquentUser;
use Carbon\Carbon;
use packages\Domain\Domain\User\Password;
use packages\Domain\Domain\User\User;
use packages\Domain\Domain\User\UserRepositoryInterface;
use packages\UseCase\MyPage\Account\AccountDetailRequest;
use packages\UseCase\MyPage\User\UserProfileRequest;

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
        /** @var EloquentUser $record */
        $record = EloquentUser::query()
            ->create([
                'nickname'   => $user->getNickName(),
                'gender'     => $user->getGenderKey(),
                'prefecture' => $user->getPrefectureKey(),
                'birthday'   => $user->getBirthDate(),
                'email'      => $user->getEmail(),
                'password'   => $user->getPassword(),
                'created_at' => Carbon::now(),
            ]);

        return $record->toModel();
    }

    /**
     * @param int $userId
     * @return User
     */
    public function find(int $userId): User
    {
        /** @var EloquentUser $record */
        $record = $this->findOrFail($userId);

        return $record->toModel();
    }

    /**
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|static|static[]
     */
    public function findOrFail(int $userId)
    {
        return EloquentUser::query()
            ->findOrFail($userId);
    }
}
