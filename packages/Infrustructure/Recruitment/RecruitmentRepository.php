<?php
declare(strict_types=1);

namespace packages\Infrustructure\Recruitment;

use App\Eloquent\EloquentRecruitment;
use App\Eloquent\EloquentUsersRecruitment;
use Carbon\Carbon;
use packages\Domain\Domain\Common\Date;
use packages\Domain\Domain\Common\Prefecture;
use packages\Domain\Domain\Recruitment\Capacity;
use packages\Domain\Domain\Recruitment\Recruitment;
use packages\Domain\Domain\Recruitment\RecruitmentRepositoryInterface;
use packages\Domain\Domain\User\BrowsingRestriction;
use packages\Domain\Domain\User\UserStatus;

class RecruitmentRepository implements RecruitmentRepositoryInterface
{
    /**
     * @param Recruitment $recruitment
     * @return void
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

    /**
     * @param BrowsingRestriction $criteria
     * @return Recruitment[]
     */
    public function searchForTop(BrowsingRestriction $criteria): array
    {
        $results = EloquentRecruitment::query()
                                      ->where(
                                          function ($q/** @var \Illuminate\Database\Eloquent\Builder $q */) use ($criteria) {
                                              $q->whereNull('gender_limit')
                                                ->orWhere('gender_limit', $criteria->gender->getKey());
                                          }
                                      )
                                      ->where(
                                          function ($q2/** @var \Illuminate\Database\Eloquent\Builder $q2 */) use ($criteria) {
                                              $q2->where(
                                                  function ($qq1/** @var \Illuminate\Database\Eloquent\Builder $qq1 */) use ($criteria) {
                                                      $qq1->whereNull('minimum_age')
                                                          ->orWhereRaw('? >= minimum_age', [$criteria->age->getValue()]);
                                                  }
                                              );
                                              $q2->where(
                                                  function ($qq2/** @var \Illuminate\Database\Eloquent\Builder $qq2 */) use ($criteria) {
                                                      $qq2->whereNull('upper_age')
                                                          ->orWhereRaw('? <= upper_age', [$criteria->age->getValue()]);
                                                  }
                                              );
                                          }
                                      )
                                      ->orderBy('date')
                                      ->get();

        $recruitmentList = [];
        foreach ($results as $r) {
            $recruitment = new Recruitment(
                $r->title,
                $r->mount,
                Prefecture::of($r->prefecture),
                $r->schedule,
                Date::of($r->date),
                Capacity::of($r->capacity),
                Date::of($r->deadline),
                $r->create_id
            );
            $recruitment->setId($r->id);

            $recruitmentList[] = $recruitment;
        }

        return $recruitmentList;
    }
}
