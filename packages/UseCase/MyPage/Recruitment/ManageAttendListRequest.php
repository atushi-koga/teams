<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Recruitment;

use packages\Domain\Domain\Recruitment\RecruitmentId;
use packages\Domain\Domain\User\UserId;

class ManageAttendListRequest
{
    /** @var UserId $userId */
    private $userId;

    /** @var RecruitmentId $recruitmentId */
    private $recruitmentId;

    public function __construct(UserId $userId, RecruitmentId $recruitmentId)
    {
        $this->userId        = $userId;
        $this->recruitmentId = $recruitmentId;
    }

    public function getUserId(): UserId
    {
        return $this->userId;
    }

    public function getRecruitmentId(): RecruitmentId
    {
        return $this->recruitmentId;
    }
}
