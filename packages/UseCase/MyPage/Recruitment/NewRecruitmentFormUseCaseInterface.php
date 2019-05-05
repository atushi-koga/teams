<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Recruitment;

interface NewRecruitmentFormUseCaseInterface
{
    /** @return NewRecruitmentFormResponse */
    public function handle();
}
