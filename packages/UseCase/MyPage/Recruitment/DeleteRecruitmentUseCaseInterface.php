<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Recruitment;

interface DeleteRecruitmentUseCaseInterface
{
    public function handle(DeleteRecruitmentRequest $request);
}
