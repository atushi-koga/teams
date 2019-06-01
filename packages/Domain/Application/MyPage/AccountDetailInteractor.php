<?php
declare(strict_types=1);

namespace packages\Domain\Application\MyPage;

use packages\Domain\Domain\User\AccountDetail;
use packages\Domain\Domain\User\User;
use packages\Domain\Domain\User\UserRepositoryInterface;
use packages\UseCase\MyPage\Account\AccountDetailRequest;
use packages\UseCase\MyPage\Account\AccountDetailUseCaseInterface;

class AccountDetailInteractor implements AccountDetailUseCaseInterface
{
    /** @var UserRepositoryInterface */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(AccountDetailRequest $request): AccountDetail
    {
        /** @var User $user */
        $user = $this->userRepository->find($request->getUserId());

        return new AccountDetail($user);
    }
}
