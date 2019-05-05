<?php

namespace packages\Domain\Domain\Recruitment;

use packages\Domain\Domain\User\BrowsingRestriction;

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
}
