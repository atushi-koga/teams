<?php
declare(strict_types=1);

namespace packages\Domain\Application\MyPage;

use packages\Domain\Domain\Recruitment\Recruitment;
use packages\Domain\Domain\Recruitment\RecruitmentRepositoryInterface;
use packages\Domain\Domain\Recruitment\TopRecruitment;
use packages\Domain\Domain\User\BrowsingRestriction;
use packages\UseCase\MyPage\Top\ShowTopResponse;
use packages\UseCase\MyPage\Top\ShowTopUseCaseInterface;

class ShowTopInteractor implements ShowTopUseCaseInterface
{
    /** @var RecruitmentRepositoryInterface */
    private $recruitmentRepository;

    public function __construct(RecruitmentRepositoryInterface $recruitmentRepository)
    {
        $this->recruitmentRepository = $recruitmentRepository;
    }

    /**
     * @param BrowsingRestriction $browsingRestriction
     * @return ShowTopResponse
     */
    public function handle(BrowsingRestriction $browsingRestriction): ShowTopResponse
    {
        /** @var TopRecruitment[] $recruitmentList */
        $topRecruitments = $this->recruitmentRepository->searchForTop($browsingRestriction);

        return new ShowTopResponse($topRecruitments);
    }
}
