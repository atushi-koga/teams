<?php
declare(strict_types=1);

namespace packages\Domain\Application;

use packages\Domain\Domain\Recruitment\DetailRecruitment;
use packages\Domain\Domain\Recruitment\RecruitmentRepositoryInterface;
use packages\UseCase\MyPage\Recruitment\JoinFinishUseCaseInterface;
use packages\UseCase\Top\DetailRecruitmentRequest;

class JoinFinishInteractor implements JoinFinishUseCaseInterface
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
     * @return DetailRecruitment
     */
    public function handle(DetailRecruitmentRequest $request): DetailRecruitment
    {
        $detailRecruitment = $this->recruitmentRepository->detail($request);

        if ($detailRecruitment->canJoin()) {
            return $detailRecruitment;
        }

        abort(404);
    }
}
