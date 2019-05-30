<?php
declare(strict_types=1);

namespace packages\Domain\Application\MyPage;

use packages\Domain\Domain\Common\Prefecture;
use packages\Domain\Domain\Recruitment\Recruitment;
use packages\Domain\Domain\Recruitment\RecruitmentId;
use packages\Domain\Domain\Recruitment\RecruitmentRepositoryInterface;
use packages\Domain\Domain\User\Gender;
use packages\UseCase\MyPage\Recruitment\EditRecruitmentFormResponse;
use packages\UseCase\MyPage\Recruitment\EditRecruitmentFormUseCaseInterface;
use packages\UseCase\MyPage\Recruitment\NewRecruitmentFormResponse;

class EditRecruitmentFormInteractor implements EditRecruitmentFormUseCaseInterface
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

    public function handle(RecruitmentId $recruitmentId)
    {
        /** @var Recruitment $recruitment */
        $recruitment = $this->recruitmentRepository->findOrFail($recruitmentId);

        /** @var array $prefectures */
        $prefectures = Prefecture::Enum();

        return new EditRecruitmentFormResponse(
            $recruitment,
            $prefectures);
    }
}
