<?php

namespace packages\Domain\Domain\User;

use packages\UseCase\MyPage\User\UserProfileRequest;

interface UserRepositoryInterface
{
    /**
     * @param User $user
     * @return User
     */
    public function create(User $user);

    /**
     * @param UserProfileRequest $request
     * @return User
     */
    public function profile(UserProfileRequest $request);

}
