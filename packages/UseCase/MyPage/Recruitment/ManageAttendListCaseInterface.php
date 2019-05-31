<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Recruitment;

interface ManageAttendListCaseInterface
{
    public function handle(ManageAttendListRequest $request);
}
