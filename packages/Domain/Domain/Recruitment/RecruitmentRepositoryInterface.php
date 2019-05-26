<?php
declare(strict_types=1);

namespace packages\Domain\Domain\Recruitment;


use packages\Domain\Domain\User\UserId;
use packages\UseCase\MyPage\Recruitment\JoinRecruitmentRequest;
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

    /**
     * @param JoinRecruitmentRequest $request
     * @return void
     */
    public function join(JoinRecruitmentRequest $request);

    /**
     * @param UserId $userId
     * @return TopRecruitment[]
     */
    public function attendList(UserId $userId);
}
