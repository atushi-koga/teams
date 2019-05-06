<?php
declare(strict_types=1);

namespace packages\Infrustructure\Recruitment;

use App\Eloquent\EloquentUsersRecruitment;
use Carbon\Carbon;
use packages\Domain\Domain\Recruitment\UsersRecruitmentRepositoryInterface;
use packages\Domain\Domain\User\UserStatus;

class UsersRecruitmentRepository implements UsersRecruitmentRepositoryInterface
{

    public function joinRecruitment(): void
    {
        EloquentUsersRecruitment::query()
                                ->insert(
                                    [
                                        'user_id'        => '',
                                        'recruitment_id' => '',
                                        'is_accepted'    => false,
                                        'user_status'    => UserStatus::PARTICIPANT_STATUS,
                                        'created_at'     => Carbon::now(),
                                    ]
                                );

    }

}
