<?php
declare(strict_types=1);

namespace packages\Domain\Application\MyPage;

use packages\Domain\Domain\Recruitment\RecruitmentRepositoryInterface;
use packages\UseCase\MyPage\Recruitment\JoinRecruitmentRequest;
use packages\UseCase\MyPage\Recruitment\JoinRecruitmentUseCaseInterface;
use packages\UseCase\Top\DetailRecruitmentRequest;

class JoinRecruitmentInteractor implements JoinRecruitmentUseCaseInterface
{
    /** @var RecruitmentRepositoryInterface $recruitmentRepository */
    private $recruitmentRepository;

    public function __construct(RecruitmentRepositoryInterface $recruitmentRepository)
    {
        $this->recruitmentRepository = $recruitmentRepository;
    }

    public function handle(DetailRecruitmentRequest $request): void
    {
        $detailRecruitment = $this->recruitmentRepository->detail($request);

        if ($detailRecruitment->canJoin()) {
            $joinReq = new JoinRecruitmentRequest($request->getBrowsingUserId(), $request->getRecruitmentId());
            $this->recruitmentRepository->join($joinReq);
        } else {
            abort(404);
        }
    }
}
