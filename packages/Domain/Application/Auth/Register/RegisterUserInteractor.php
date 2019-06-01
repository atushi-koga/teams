<?php
declare(strict_types=1);

namespace packages\Domain\Application\Auth\Register;

use packages\Domain\Domain\User\User;
use packages\Domain\Domain\User\UserRepositoryInterface;
use packages\UseCase\Auth\Register\RegisterUserUseCaseInterface;

class RegisterUserInteractor implements RegisterUserUseCaseInterface
{
    /** @var UserRepositoryInterface */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param User $user
     * @return User
     */
    public function handle(User $user): User
    {
        return $this->userRepository->create($user);
    }
}
