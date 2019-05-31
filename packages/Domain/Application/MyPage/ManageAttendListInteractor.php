<?php
declare(strict_types=1);

namespace packages\Domain\Application;

use packages\Domain\Domain\Recruitment\RecruitmentRepositoryInterface;
use packages\Domain\Domain\User\OpenUserInfo;
use packages\Domain\Domain\User\UserId;
use packages\Domain\Domain\User\UserRepositoryInterface;
use packages\UseCase\MyPage\Recruitment\ManageAttendListCaseInterface;
use packages\UseCase\MyPage\Recruitment\ManageAttendListRequest;

class ManageAttendListInteractor implements ManageAttendListCaseInterface
{
    /** @var RecruitmentRepositoryInterface $recruitmentRepository */
    private $recruitmentRepository;

    /** @var UserRepositoryInterface $userRepository */
    private $userRepository;

    public function __construct(
        RecruitmentRepositoryInterface $recruitmentRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->recruitmentRepository = $recruitmentRepository;
        $this->userRepository        = $userRepository;
    }

    /**
     * @param ManageAttendListRequest $request
     * @return OpenUserInfo[]
     */
    public function handle(ManageAttendListRequest $request): array
    {
        $userIds      = $this->recruitmentRepository->manageAttendList($request);

        $openUserInfo = [];
        if (count($userIds) > 0) {
            /** @var UserId[] $users */
            $users = $this->userRepository->getByIds($userIds);
            foreach ($users as $user) {
                $openUserInfo[] = OpenUserInfo::of($user);
            }
        }

        return $openUserInfo;
    }
}
