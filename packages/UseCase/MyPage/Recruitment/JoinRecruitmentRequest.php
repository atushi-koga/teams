<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Recruitment;

class JoinRecruitmentRequest
{
    /** @var int $userId */
    private $userId;

    /** @var int $recruitmentId */
    private $recruitmentId;

    public function __construct(int $userId, int $recruitmentId)
    {
        $this->userId        = $userId;
        $this->recruitmentId = $recruitmentId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getRecruitmentId(): int
    {
        return $this->recruitmentId;
    }
}
