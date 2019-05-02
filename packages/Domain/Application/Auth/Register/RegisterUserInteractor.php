<?php

namespace packages\Domain\Application\Auth\Register;

use packages\Domain\Domain\User\User;
use packages\Domain\Domain\User\UserRepositoryInterface;
use packages\UseCase\Auth\Register\RegisterUserUseCaseInterface;

class RegisterUserInteractor implements RegisterUserUseCaseInterface
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(User $user)
    {
        $created_user = $this->userRepository->create($user);

        return $created_user;
    }
}
