<?php
declare(strict_types=1);

namespace packages\Domain\Domain\Recruitment;

use packages\Domain\Domain\User\UserId;

class UserRecruitment
{
    /** @var UserId $userId */
    private $userId;

    /** @var int $recruitmentId */
    private $recruitmentId;

    public function __construct(UserId $userId, int $recruitmentId)
    {
        $this->userId        = $userId;
        $this->recruitmentId = $recruitmentId;
    }

    public static function ofByArray(array $attributes): self
    {
        return new self(
            $attributes['user_id'],
            $attributes['recruitment_id']
        );
    }

    public function getUserId(): int
    {
        return $this->userId->getValue();
    }

    public function getRecruitmentId(): int
    {
        return $this->recruitmentId;
    }

}
