<?php
declare(strict_types=1);

namespace packages\Infrustructure\Recruitment;

use App\Eloquent\EloquentRecruitment;
use App\Eloquent\EloquentUser;
use App\Eloquent\EloquentUsersRecruitment;
use Carbon\Carbon;
use DB;
use packages\Domain\Domain\Recruitment\DetailRecruitment;
use packages\Domain\Domain\Recruitment\Recruitment;
use packages\Domain\Domain\Recruitment\RecruitmentRepositoryInterface;
use packages\Domain\Domain\Recruitment\TopRecruitment;
use packages\Domain\Domain\User\BrowsingRestriction;
use packages\Domain\Domain\User\OpenUserInfo;
use packages\Domain\Domain\User\UserStatus;
use packages\UseCase\MyPage\Recruitment\DetailRecruitmentRequest;

class RecruitmentRepository implements RecruitmentRepositoryInterface
{
    /**
     * @param Recruitment $recruitment
     * @return Recruitment
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(Recruitment $recruitment): Recruitment
    {
        return DB::transaction(
            function () use ($recruitment) {
                /** @var EloquentRecruitment $recruitmentRecord */
                $recruitmentRecord = EloquentRecruitment::query()
                                                        ->create(
                                                            [
                                                                'title'       => $recruitment->getTitle(),
                                                                'mount'       => $recruitment->getMount(),
                                                                'prefecture'  => $recruitment->getPrefectureKey(),
                                                                'schedule'    => $recruitment->getSchedule(),
                                                                'date'        => $recruitment->getFormatDate(),
                                                                'capacity'    => $recruitment->getCapacityValue(),
                                                                'deadline'    => $recruitment->getFormatDeadline(),
                                                                'requirement' => $recruitment->getRequirement(),
                                                                'belongings'  => $recruitment->getBelongings(),
                                                                'notes'       => $recruitment->getNotes(),
                                                                'create_id'   => $recruitment->getCreateUserId(),
                                                            ]);

                EloquentUsersRecruitment::query()
                                        ->create(
                                            [
                                                'user_id'        => $recruitmentRecord->create_id,
                                                'recruitment_id' => $recruitmentRecord->id,
                                                'is_accepted'    => true,
                                                'user_status'    => UserStatus::ADMIN_STATUS,
                                                'created_at'     => Carbon::now(),
                                            ]);

                $newRecruitment = $recruitmentRecord->toModel();
                $newRecruitment->setId($recruitmentRecord->id);

                return $newRecruitment;
            });
    }

    /**
     * 公開範囲の募集情報を表示する
     *
     * @return TopRecruitment[]
     */
    public function searchForTop(): array
    {
        $results = EloquentRecruitment::query()
                                      ->orderBy('date')
                                      ->get();

        $topRecruitments = [];
        foreach ($results as $r/** @var EloquentRecruitment $r */) {
            $recruitment = $r->toModel();
            $recruitment->setId($r->id);

            $count = $r->usersRecruitment()
                       ->entryUser()
                       ->count();
            $recruitment->setEntryCount($count);

            $createUser = $r->createUser->toModel();

            $topRecruitments[] = TopRecruitment::ofByArray([
                'recruitment' => $recruitment,
                'createUser'  => $createUser,
            ]);
        }

        return $topRecruitments;
    }

    /**
     * @param DetailRecruitmentRequest $request
     * @return DetailRecruitment
     */
    public function detail(DetailRecruitmentRequest $request): DetailRecruitment
    {
        /** @var EloquentRecruitment $recruitmentRecord */
        $recruitmentRecord = EloquentRecruitment::query()
                                                ->whereGenderAndAgeLimit($request->browsingRestriction)
                                                ->findOrFail($request->recruitment_id);

        $recruitment = $recruitmentRecord->toModel();
        $recruitment->setId($recruitmentRecord->id);

        $entryUsers = $recruitmentRecord->usersRecruitment()
                                        ->entryUser()
                                        ->get();
        $recruitment->setEntryCount($entryUsers->count());

        $participantInfoList = [];
        foreach ($entryUsers as $userRecruitment) {
            $user            = $userRecruitment->user;
            $participantInfo = OpenUserInfo::of($user->toModel());

            $participantInfoList[] = $participantInfo;
        }

        /** @var EloquentUser $createUserRecord */
        $createUserRecord = $recruitmentRecord->createUser;
        $createUserInfo   = OpenUserInfo::of($createUserRecord->toModel());

        $detailRecruitment = new DetailRecruitment(
            $recruitment,
            $createUserInfo,
            $request->browsing_user_id,
            $participantInfoList
        );

        return $detailRecruitment;
    }
}
