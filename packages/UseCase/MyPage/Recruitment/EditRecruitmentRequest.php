<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Recruitment;

use packages\Domain\Domain\Recruitment\Recruitment;
use packages\Domain\Domain\User\UserId;

class EditRecruitmentRequest
{
    /** @var UserId $editUserId */
    private $editUserId;

    /** @var Recruitment $recruitment */
    private $recruitment;

    public function __construct(UserId $editUserId, Recruitment $recruitment)
    {
        $this->editUserId  = $editUserId;
        $this->recruitment = $recruitment;
    }

    public function getEditUserId(): UserId
    {
        return $this->editUserId;
    }

    public function getRecruitment(): Recruitment
    {
        return $this->recruitment;
    }
}
