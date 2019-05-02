<?php

namespace packages\Domain\Application\Auth;

use packages\UseCase\Auth\Register\RegisterUserUseCaseInterface;

class RegisterUserInteractor implements RegisterUserUseCaseInterface
{
    public function handle()
    {
        dd('interactor');
    }
}
