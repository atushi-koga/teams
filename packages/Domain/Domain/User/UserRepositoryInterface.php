<?php

namespace packages\Domain\Domain\User;

interface UserRepositoryInterface
{
    /**
     * @param User $user
     * @return User
     */
    public function create(User $user);
}
