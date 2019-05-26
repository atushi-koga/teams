<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\User;

use packages\Domain\Domain\User\OpenUserInfo;

interface UserProfileUseCaseInterface
{
    /**
     * @param UserProfileRequest $request
     * @return OpenUserInfo
     */
    public function handle(UserProfileRequest $request);
}
