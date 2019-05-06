<?php
declare(strict_types=1);

namespace packages\Domain\Domain\Recruitment;

use packages\Domain\Domain\User\BrowsingRestriction;
use packages\UseCase\MyPage\Recruitment\DetailRecruitmentRequest;

interface RecruitmentRepositoryInterface
{
    /**
     * @param Recruitment $recruitment
     * @return void
     */
    public function create(Recruitment $recruitment);

    /**
     * @param BrowsingRestriction $criteria
     * @return Recruitment[]
     */
    public function searchForTop(BrowsingRestriction $criteria);

    /**
     * @param DetailRecruitmentRequest $request
     * @return DetailRecruitment
     */
    public function detail(DetailRecruitmentRequest $request);
}
