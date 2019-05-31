<?php

namespace packages\Domain\Domain\User;

use packages\UseCase\MyPage\Account\AccountDetailRequest;
use packages\UseCase\MyPage\Account\AccountEditRequest;
use packages\UseCase\MyPage\User\UserProfileRequest;

interface UserRepositoryInterface
{
    /**
     * @param User $user
     * @return User
     */
    public function create(User $user);

    /**
     * @param int $userId
     * @return User
     */
    public function find(int $userId);

    /**
     * @param AccountEditRequest $request
     * @return void
     */
    public function edit(AccountEditRequest $request);

    /**
     * @param array $userIds
     * @return User[]
     */
    public function getByIds(array $userIds);
}
