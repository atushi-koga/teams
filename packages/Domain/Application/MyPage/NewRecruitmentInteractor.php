<?php
declare(strict_types=1);

namespace packages\Domain\Application\MyPage;

use packages\Domain\Domain\Recruitment\Recruitment;
use packages\Domain\Domain\Recruitment\RecruitmentRepositoryInterface;
use packages\UseCase\MyPage\Recruitment\NewRecruitmentUseCaseInterface;

class NewRecruitmentInteractor implements NewRecruitmentUseCaseInterface
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
     * @param Recruitment $recruitment
     * @return void
     */
    public function handle(Recruitment $recruitment): void
    {
        $this->recruitmentRepository->create($recruitment);
    }
}
