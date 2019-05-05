<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Recruitment;

use packages\Domain\Domain\Recruitment\Recruitment;

interface NewRecruitmentUseCaseInterface
{

    public function handle(Recruitment $recruitment);
}
