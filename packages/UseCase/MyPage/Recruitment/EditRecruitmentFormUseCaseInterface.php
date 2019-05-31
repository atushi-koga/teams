<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Recruitment;

use packages\Domain\Domain\Recruitment\RecruitmentId;

interface EditRecruitmentFormUseCaseInterface
{
    public function handle(RecruitmentId $recruitmentId);
}
