<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Recruitment;

use packages\Domain\Domain\Recruitment\UserRecruitment;

interface CancelAttendUseCaseInterface
{
    /**
     * @param UserRecruitment $userRecruitment
     */
    public function handle(UserRecruitment $userRecruitment);
}
