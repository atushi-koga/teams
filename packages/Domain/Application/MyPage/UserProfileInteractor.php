<?php
declare(strict_types=1);

namespace packages\Domain\Application\MyPage;

use packages\Domain\Domain\User\OpenUserInfo;
use packages\Domain\Domain\User\User;
use packages\Domain\Domain\User\UserRepositoryInterface;
use packages\UseCase\MyPage\User\UserProfileRequest;
use packages\UseCase\MyPage\User\UserProfileUseCaseInterface;

class UserProfileInteractor implements UserProfileUseCaseInterface
{
    /** @var UserRepositoryInterface */
    private $userRepository;

    /**
     * NewRecruitmentInteractor constructor.
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(UserProfileRequest $request): OpenUserInfo
    {
        /** @var User $user */
        $user = $this->userRepository->find($request->getUserId());

        return OpenUserInfo::of($user);
    }
}
