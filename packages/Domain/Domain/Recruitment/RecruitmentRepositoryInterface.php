<?php
declare(strict_types=1);

namespace packages\Domain\Domain\Recruitment;


use packages\UseCase\Top\DetailRecruitmentRequest;

interface RecruitmentRepositoryInterface
{
    /**
     * @param Recruitment $recruitment
     * @return Recruitment
     */
    public function create(Recruitment $recruitment);

    /**
     * @return Recruitment[]
     */
    public function searchForTop();

    /**
     * @param DetailRecruitmentRequest $request
     * @return DetailRecruitment
     */
    public function detail(DetailRecruitmentRequest $request);

}
