<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Recruitment;

class JoinRecruitmentRequest
{
    public $user_id;

    public $recruitment_id;


    public function __construct(int $user_id, int $recruitment_id)
    {
        $this->user_id        = $user_id;
        $this->recruitment_id = $recruitment_id;
    }
}
