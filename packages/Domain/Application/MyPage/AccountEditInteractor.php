<?php
declare(strict_types=1);

namespace packages\Domain\Application\MyPage;

use packages\Domain\Domain\Common\Prefecture;
use packages\Domain\Domain\User\AccountEditForm;
use packages\Domain\Domain\User\User;
use packages\Domain\Domain\User\UserRepositoryInterface;
use packages\UseCase\MyPage\Account\AccountEditRequest;
use packages\UseCase\MyPage\Account\AccountEditUseCaseInterface;

class AccountEditInteractor implements AccountEditUseCaseInterface
{
    /** @var UserRepositoryInterface */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(AccountEditRequest $request)
    {
        $this->userRepository->edit($request);
    }
}
