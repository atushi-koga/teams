<?php

namespace packages\UseCase\Auth\Register;

use packages\Domain\Domain\User\User;

interface RegisterUserUseCaseInterface
{
    public function handle(User $user);
}
