<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Recruitment;

use packages\Domain\Domain\Recruitment\DetailRecruitment;
use packages\UseCase\Top\DetailRecruitmentRequest;

interface JoinFinishUseCaseInterface
{
    /**
     * @param DetailRecruitmentRequest $request
     * @return DetailRecruitment
     */
    public function handle(DetailRecruitmentRequest $request);
}
