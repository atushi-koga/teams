<?php
declare(strict_types=1);

namespace packages\Infrustructure\Recruitment;

use App\Eloquent\EloquentRecruitment;
use App\Eloquent\EloquentUser;
use App\Eloquent\EloquentUsersRecruitment;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use packages\Domain\Domain\Recruitment\CreatedRecruitment;
use packages\Domain\Domain\Recruitment\DetailRecruitment;
use packages\Domain\Domain\Recruitment\Recruitment;
use packages\Domain\Domain\Recruitment\RecruitmentId;
use packages\Domain\Domain\Recruitment\RecruitmentRepositoryInterface;
use packages\Domain\Domain\Recruitment\TopRecruitment;
use packages\Domain\Domain\Recruitment\UserRecruitment;
use packages\Domain\Domain\User\BrowsingRestriction;
use packages\Domain\Domain\User\OpenUserInfo;
use packages\Domain\Domain\User\UserId;
use packages\Domain\Domain\User\UserStatus;
use packages\UseCase\MyPage\Recruitment\DeleteRecruitmentRequest;
use packages\UseCase\MyPage\Recruitment\EditRecruitmentRequest;
use packages\UseCase\MyPage\Recruitment\JoinRecruitmentRequest;
use packages\UseCase\MyPage\Recruitment\ManageAttendListRequest;
use packages\UseCase\Top\DetailRecruitmentRequest;

class RecruitmentRepository implements RecruitmentRepositoryInterface
{
    /**
     * @param Recruitment $recruitment
     * @return void
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(Recruitment $recruitment): void
    {
        DB::transaction(function () use ($recruitment) {
            /** @var EloquentRecruitment $eloquentRec */
            $eloquentRec = EloquentRecruitment::query()
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
                                            'user_id'        => $eloquentRec->create_id,
                                            'recruitment_id' => $eloquentRec->id,
                                            'is_accepted'    => true,
                                            'user_status'    => UserStatus::ADMIN_STATUS,
                                            'created_at'     => Carbon::now(),
                                        ]);
        });
    }

    /**
     * @param EditRecruitmentRequest $request
     */
    public function edit(EditRecruitmentRequest $request): void
    {
        $recruitment = $request->getRecruitment();
        $editUserId  = $request->getEditUserId();

        EloquentRecruitment::query()
                           ->where('create_id', $editUserId->getValue())
                           ->findOrFail($recruitment->getId())
                           ->update([
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
                               'update_id'   => $editUserId->getValue(),
                           ]);
    }

    /**
     * @param DeleteRecruitmentRequest $request
     * @throws \Exception
     * @throws \Throwable
     */
    public function delete(DeleteRecruitmentRequest $request): void
    {
        $userId        = $request->getDeleteUserId()
                                 ->getValue();
        $recruitmentId = $request->getRecruitmentId()
                                 ->getValue();
        $eloquentRec   = EloquentRecruitment::query()
                                            ->where('create_id', $userId)
                                            ->findOrFail($recruitmentId);

        DB::transaction(function () use ($eloquentRec) {
            EloquentUsersRecruitment::query()
                                    ->where('recruitment_id', $eloquentRec->id)
                                    ->delete();
            $eloquentRec->delete();
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

    public function findOrFail(RecruitmentId $recruitmentId): Recruitment
    {
        /** @var EloquentRecruitment $eloquentRec */
        $eloquentRec = EloquentRecruitment::query()
                                          ->findOrFail($recruitmentId->getValue());

        $recruitment = $eloquentRec->toModel();
        $recruitment->setId($eloquentRec->id);

        return $recruitment;
    }

    public function detail(DetailRecruitmentRequest $request): DetailRecruitment
    {
        /** @var EloquentRecruitment $recruitmentRecord */
        $recruitmentRecord = EloquentRecruitment::query()
                                                ->findOrFail($request->getRecruitmentId());

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
            $request->getBrowsingUserId(),
            $participantInfoList
        );

        return $detailRecruitment;
    }

    public function join(JoinRecruitmentRequest $request): void
    {
        EloquentUsersRecruitment::query()
                                ->create([
                                    'user_id'        => $request->getUserId(),
                                    'recruitment_id' => $request->getRecruitmentId(),
                                    'is_accepted'    => false,
                                    'user_status'    => UserStatus::PARTICIPANT_STATUS,
                                    'created_at'     => Carbon::now(),
                                ]);
    }

    /**
     * @param UserId $userId
     * @return TopRecruitment[]
     */
    public function MyAttendList(UserId $userId): array
    {
        $results = EloquentUsersRecruitment::query()
                                           ->where('user_id', $userId->getValue())
                                           ->get();

        if ($results->count() === 0) {
            return [];
        }

        $recruitmentIds = $results->pluck('recruitment_id')
                                  ->toArray();
        $EloquentRecs   = EloquentRecruitment::query()
                                             ->whereIn('id', $recruitmentIds)
                                             ->orderBy('date', 'desc')
                                             ->get();

        $attendList = [];
        foreach ($EloquentRecs as $EloquentRec) {
            /** @var Recruitment $recruitment */
            $recruitment = $EloquentRec->toModel();
            $recruitment->setId($EloquentRec->id);

            $count = $EloquentRec->usersRecruitment()
                                 ->entryUser()
                                 ->count();
            $recruitment->setEntryCount($count);

            $createUser = $EloquentRec->createUser->toModel();

            $attendList[] = TopRecruitment::ofByArray([
                'recruitment' => $recruitment,
                'createUser'  => $createUser,
            ]);
        }

        return $attendList;
    }

    /**
     * @param ManageAttendListRequest $request
     * @return array
     */
    public function manageAttendList(ManageAttendListRequest $request): array
    {
        $recruitmentId  = $request->getRecruitmentId()
                                  ->getValue();
        $browsingUserId = $request->getUserId()
                                  ->getValue();

        /** @var EloquentRecruitment $eloquentRec */
        $eloquentRec = EloquentRecruitment::query()
                                          ->where('create_id', $browsingUserId)
                                          ->findOrFail($recruitmentId);

        $userIds = $eloquentRec->usersRecruitment()
                               ->entryUser()
                               ->get()
                               ->map(function ($item) {
                                   return $item->user_id;
                               })
                               ->toArray();

        return $userIds;
    }

    /**
     * @param UserId $userId
     * @return CreatedRecruitment[]
     */
    public function createdList(UserId $userId): array
    {
        $EloquentRecs = EloquentRecruitment::query()
                                           ->where('create_id', $userId->getValue())
                                           ->orderBy('date', 'desc')
                                           ->get();

        if ($EloquentRecs->count() === 0) {
            return [];
        }

        $createdList = [];
        foreach ($EloquentRecs as $EloquentRec) {
            /** @var Recruitment $recruitment */
            $recruitment = $EloquentRec->toModel();
            $recruitment->setId($EloquentRec->id);

            $count = $EloquentRec->usersRecruitment()
                                 ->entryUser()
                                 ->count();
            $recruitment->setEntryCount($count);

            $createdList[] = CreatedRecruitment::of($recruitment);
        }

        return $createdList;
    }

    /**
     * @param UserRecruitment $userRecruitment
     * @return null|Recruitment
     */
    public function findAttend(UserRecruitment $userRecruitment): ?Recruitment
    {
        $EloquentUserRec = EloquentUsersRecruitment::query()
                                                   ->where('user_id', $userRecruitment->getUserId())
                                                   ->where('recruitment_id', $userRecruitment->getRecruitmentId())
                                                   ->first();

        if ($EloquentUserRec) {
            $EloquentRec = $EloquentUserRec->recruitment;
            $recruitment = $EloquentRec->toModel();
            $recruitment->setId($EloquentRec->id);

            return $recruitment;
        } else {
            return null;
        }
    }

    public function cancel(UserRecruitment $userRecruitment): void
    {
        EloquentUsersRecruitment::query()
                                ->where('user_id', $userRecruitment->getUserId())
                                ->where('recruitment_id', $userRecruitment->getRecruitmentId())
                                ->delete();
    }
}
