<?php
declare(strict_types=1);

namespace packages\Domain\Domain\Recruitment;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use packages\Domain\Domain\User\UserId;
use packages\UseCase\MyPage\Recruitment\DeleteRecruitmentRequest;
use packages\UseCase\MyPage\Recruitment\EditRecruitmentRequest;
use packages\UseCase\MyPage\Recruitment\JoinRecruitmentRequest;
use packages\UseCase\MyPage\Recruitment\ManageAttendListRequest;
use packages\UseCase\Top\DetailRecruitmentRequest;

interface RecruitmentRepositoryInterface
{
    /**
     * @param Recruitment $recruitment
     * @return void
     */
    public function create(Recruitment $recruitment);

    /**
     * @param EditRecruitmentRequest $request
     * @return void
     */
    public function edit(EditRecruitmentRequest $request);

    /**
     * @param DeleteRecruitmentRequest $request
     * @return void
     */
    public function delete(DeleteRecruitmentRequest $request);

    /**
     * @return Recruitment[]
     */
    public function searchForTop();

    /**
     * @param RecruitmentId $recruitmentId
     * @return Recruitment
     */
    public function findOrFail(RecruitmentId $recruitmentId);


    /**
     * @param DetailRecruitmentRequest $request
     * @return DetailRecruitment
     */
    public function detail(DetailRecruitmentRequest $request);

    /**
     * @param JoinRecruitmentRequest $request
     * @return void
     */
    public function join(JoinRecruitmentRequest $request);

    /**
     * @param UserId $userId
     * @return TopRecruitment[]
     */
    public function MyAttendList(UserId $userId);

    /**
     * @param ManageAttendListRequest $request
     * @return array
     */
    public function manageAttendList(ManageAttendListRequest $request);

    /**
     * @param UserId $userId
     * @return CreatedRecruitment[]
     */
    public function createdList(UserId $userId);

        /**
     * @param UserRecruitment $userRecruitment
     * @return null|Recruitment
     */
    public function findAttend(UserRecruitment $userRecruitment);

    /**
     * @param UserRecruitment $userRecruitment
     * @return void
     */
    public function cancel(UserRecruitment $userRecruitment);
}
