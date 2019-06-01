<?php
declare(strict_types=1);

namespace packages\Domain\Application;

use packages\Domain\Domain\Recruitment\DetailRecruitment;
use packages\Domain\Domain\Recruitment\Recruitment;
use packages\Domain\Domain\Recruitment\RecruitmentRepositoryInterface;
use packages\UseCase\Top\DetailRecruitmentRequest;
use packages\UseCase\Top\DetailRecruitmentUseCaseInterface;

class DetailRecruitmentInteractor implements DetailRecruitmentUseCaseInterface
{
    /** @var RecruitmentRepositoryInterface */
    private $recruitmentRepository;

    public function __construct(RecruitmentRepositoryInterface $recruitmentRepository)
    {
        $this->recruitmentRepository = $recruitmentRepository;
    }

    public function handle(DetailRecruitmentRequest $request): DetailRecruitment
    {
        return $this->recruitmentRepository->detail($request);
    }
}
