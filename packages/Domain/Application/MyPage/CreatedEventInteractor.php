<?php
declare(strict_types=1);

namespace packages\Domain\Application;

use packages\Domain\Domain\Recruitment\CreatedRecruitment;
use packages\Domain\Domain\Recruitment\RecruitmentRepositoryInterface;
use packages\Domain\Domain\Recruitment\TopRecruitment;
use packages\Domain\Domain\User\UserId;
use packages\UseCase\MyPage\Recruitment\CreatedEventUseCaseInterface;

class CreatedEventInteractor implements CreatedEventUseCaseInterface
{
    /** @var RecruitmentRepositoryInterface */
    private $recruitmentRepository;

    /**
     * @param RecruitmentRepositoryInterface $recruitmentRepository
     */
    public function __construct(RecruitmentRepositoryInterface $recruitmentRepository)
    {
        $this->recruitmentRepository = $recruitmentRepository;
    }

    /**
     * @param UserId $userId
     * @return CreatedRecruitment[]
     */
    public function handle(UserId $userId): array
    {
        return $this->recruitmentRepository->createdList($userId);
    }
}
