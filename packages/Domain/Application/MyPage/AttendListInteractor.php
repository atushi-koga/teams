<?php
declare(strict_types=1);

namespace packages\Domain\Application;

use packages\Domain\Domain\Recruitment\RecruitmentRepositoryInterface;
use packages\Domain\Domain\Recruitment\TopRecruitment;
use packages\Domain\Domain\User\UserId;
use packages\UseCase\MyPage\Recruitment\AttendListCaseInterface;

class AttendListInteractor implements AttendListCaseInterface
{
    /** @var RecruitmentRepositoryInterface */
    private $recruitmentRepository;

    /**
     * NewRecruitmentInteractor constructor.
     *
     * @param RecruitmentRepositoryInterface $recruitmentRepository
     */
    public function __construct(RecruitmentRepositoryInterface $recruitmentRepository)
    {
        $this->recruitmentRepository = $recruitmentRepository;
    }

    /**
     * @param UserId $userId
     * @return TopRecruitment[]
     */
    public function handle(UserId $userId): array
    {
        return $this->recruitmentRepository->attendList($userId);
    }
}
