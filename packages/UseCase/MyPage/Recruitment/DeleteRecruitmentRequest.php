<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Recruitment;

use packages\Domain\Domain\Recruitment\RecruitmentId;
use packages\Domain\Domain\User\UserId;

class DeleteRecruitmentRequest
{
    /** @var UserId $deleteUserId */
    private $deleteUserId;

    /** @var RecruitmentId $recruitmentId */
    private $recruitmentId;

    public function __construct(UserId $deleteUserId, RecruitmentId $recruitmentId)
    {
        $this->deleteUserId  = $deleteUserId;
        $this->recruitmentId = $recruitmentId;
    }

    public function getDeleteUserId(): UserId
    {
        return $this->deleteUserId;
    }

    public function getRecruitmentId(): RecruitmentId
    {
        return $this->recruitmentId;
    }
}
