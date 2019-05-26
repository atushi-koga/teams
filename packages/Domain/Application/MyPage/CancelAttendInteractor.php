<?php
declare(strict_types=1);

namespace packages\Domain\Application\MyPage;

use packages\Domain\Domain\Recruitment\RecruitmentRepositoryInterface;
use packages\Domain\Domain\Recruitment\UserRecruitment;
use packages\UseCase\MyPage\Recruitment\CancelAttendUseCaseInterface;

class CancelAttendInteractor implements CancelAttendUseCaseInterface
{
    /** @var RecruitmentRepositoryInterface $recruitmentRepository */
    private $recruitmentRepository;

    public function __construct(RecruitmentRepositoryInterface $recruitmentRepository)
    {
        $this->recruitmentRepository = $recruitmentRepository;
    }

    public function handle(UserRecruitment $userRecruitment): void
    {
        $result = $this->recruitmentRepository->findAttend($userRecruitment);
        if ($result) {
            $this->recruitmentRepository->cancel($userRecruitment);
        } else {
            abort(404);
        }
    }
}
