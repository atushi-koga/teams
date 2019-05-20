<?php

namespace packages\Domain\Domain\User;

use packages\UseCase\MyPage\Account\AccountDetailRequest;
use packages\UseCase\MyPage\User\UserProfileRequest;

interface UserRepositoryInterface
{
    /**
     * @param User $user
     * @return User
     */
    public function create(User $user);

    /**
     * @param int $request
     * @return User
     */
    public function find(int $request);
}
