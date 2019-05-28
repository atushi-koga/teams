<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Recruitment;

use packages\Domain\Domain\User\UserId;

interface CreatedEventUseCaseInterface
{
    /**
     * @param UserId $userId
     */
    public function handle(UserId $userId);
}
