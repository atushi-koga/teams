<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Recruitment;

use packages\Domain\Domain\User\BrowsingRestriction;

class DetailRecruitmentRequest
{
    /** @var int */
    public $recruitment_id;

    /** @var int */
    public $browsing_user_id;

    /** @var BrowsingRestriction $browsingRestriction */
    public $browsingRestriction;

    /**
     * DetailRecruitmentRequest constructor.
     *
     * @param int                 $recruitment_id
     * @param int                 $browsing_user_id
     * @param BrowsingRestriction $browsingRestriction
     */
    public function __construct(
        int $recruitment_id,
        int $browsing_user_id,
        BrowsingRestriction $browsingRestriction)
    {
        $this->recruitment_id      = $recruitment_id;
        $this->browsing_user_id    = $browsing_user_id;
        $this->browsingRestriction = $browsingRestriction;
    }
}
