<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\User;

class UserProfileRequest
{
    /** @var int $userId */
    public $userId;

    /**
     * DetailRecruitmentRequest constructor.
     *
     * @param int $userId
     */
    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }
}
