<?php
declare(strict_types=1);

namespace packages\Domain\Application\MyPage;

use packages\Domain\Domain\Common\Prefecture;
use packages\Domain\Domain\User\AccountEditForm;
use packages\Domain\Domain\User\User;
use packages\Domain\Domain\User\UserRepositoryInterface;
use packages\UseCase\MyPage\Account\ShowAccountEditUseCaseInterface;
use packages\UseCase\MyPage\Account\ShowAccountEditRequest;

class ShowAccountEditInteractor implements ShowAccountEditUseCaseInterface
{
    /** @var UserRepositoryInterface */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(ShowAccountEditRequest $request): AccountEditForm
    {
        /** @var User $user */
        $user = $this->userRepository->find($request->getUserId());

        return new AccountEditForm($user, Prefecture::Enum());
    }
}
