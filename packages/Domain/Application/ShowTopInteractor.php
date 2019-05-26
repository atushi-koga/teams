<?php
declare(strict_types=1);

namespace packages\Domain\Application;

use packages\Domain\Domain\Recruitment\Recruitment;
use packages\Domain\Domain\Recruitment\RecruitmentRepositoryInterface;
use packages\Domain\Domain\Recruitment\TopRecruitment;
use packages\Domain\Domain\User\BrowsingRestriction;
use packages\UseCase\Top\ShowTopResponse;
use packages\UseCase\Top\ShowTopUseCaseInterface;

class ShowTopInteractor implements ShowTopUseCaseInterface
{
    /** @var RecruitmentRepositoryInterface */
    private $recruitmentRepository;

    public function __construct(RecruitmentRepositoryInterface $recruitmentRepository)
    {
        $this->recruitmentRepository = $recruitmentRepository;
    }

    /**
     * @return ShowTopResponse
     */
    public function handle(): ShowTopResponse
    {
        /** @var TopRecruitment[] $recruitmentList */
        $topRecruitments = $this->recruitmentRepository->searchForTop();

        return new ShowTopResponse($topRecruitments);
    }
}
