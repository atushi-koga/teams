<?php
declare(strict_types=1);

namespace packages\Domain\Application;

use packages\Domain\Domain\Recruitment\DetailRecruitment;
use packages\Domain\Domain\Recruitment\RecruitmentRepositoryInterface;
use packages\UseCase\MyPage\Recruitment\JoinConfUseCaseInterface;
use packages\UseCase\Top\DetailRecruitmentRequest;

class JoinConfInteractor implements JoinConfUseCaseInterface
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
     * @param DetailRecruitmentRequest $request
     * @return DetailRecruitment|null
     */
    public function handle(DetailRecruitmentRequest $request): ?DetailRecruitment
    {
        $detailRecruitment = $this->recruitmentRepository->detail($request);

        if ($detailRecruitment->canJoin()) {
            return $detailRecruitment;
        } else {
            return null;
        }
    }
}
