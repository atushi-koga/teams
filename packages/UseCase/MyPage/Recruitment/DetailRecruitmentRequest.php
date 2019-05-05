<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Recruitment;

class DetailRecruitmentRequest
{
    /** @var int  */
    public $recruitment_id;

    /** @var int  */
    public $browsing_user_id;

    /**
     * DetailRecruitmentRequest constructor.
     *
     * @param int $recruitment_id
     * @param int $browsing_user_id
     */
    public function __construct(int $recruitment_id, int $browsing_user_id)
    {
        $this->recruitment_id   = $recruitment_id;
        $this->browsing_user_id = $browsing_user_id;
    }
}
