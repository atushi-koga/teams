<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Recruitment;

interface EditRecruitmentUseCaseInterface
{
    public function handle(EditRecruitmentRequest $request);
}
