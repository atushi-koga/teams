<?php
declare(strict_types=1);

namespace packages\UseCase\Top;

use packages\Domain\Domain\Recruitment\DetailRecruitment;

interface DetailRecruitmentUseCaseInterface
{
    /**
     * @param DetailRecruitmentRequest $request
     * @return DetailRecruitment
     */
    public function handle(DetailRecruitmentRequest $request);
}
