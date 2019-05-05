<?php
declare(strict_types=1);

namespace packages\Infrustructure\Recruitment;

use App\Eloquent\EloquentRecruitment;
use App\Eloquent\EloquentUsersRecruitment;
use Carbon\Carbon;
use packages\Domain\Domain\Recruitment\Recruitment;
use packages\Domain\Domain\Recruitment\RecruitmentRepositoryInterface;
use packages\Domain\Domain\User\UserStatus;

class RecruitmentRepository implements RecruitmentRepositoryInterface
{
    /**
     * @param Recruitment $recruitment
     */
    public function create(Recruitment $recruitment): void
    {
        $recruitmentRecord = EloquentRecruitment::query()
                                                ->create(
                                                    [
                                                        'title'      => $recruitment->getTitle(),
                                                        'mount'      => $recruitment->getMount(),
                                                        'prefecture' => $recruitment->getPrefectureKey(),
                                                        'schedule'   => $recruitment->getSchedule(),
                                                        'date'       => $recruitment->getFormatDate(),
                                                        'capacity'   => $recruitment->getCapacityValue(),
                                                        'deadline'   => $recruitment->getFormatDeadline(),
                                                        'create_id'  => $recruitment->getCreateUserId(),
                                                    ]
                                                );

        EloquentUsersRecruitment::query()
                                ->create(
                                    [
                                        'user_id'        => $recruitmentRecord->create_id,
                                        'recruitment_id' => $recruitmentRecord->id,
                                        'is_accepted'    => true,
                                        'user_status'    => UserStatus::ADMIN_STATUS,
                                        'created_at'     => Carbon::now(),
                                    ]
                                );
    }
}
