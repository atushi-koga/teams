<?php
declare(strict_types=1);

namespace packages\Domain\Application\MyPage;

use packages\Domain\Domain\Recruitment\RecruitmentRepositoryInterface;
use packages\UseCase\MyPage\Recruitment\DeleteRecruitmentRequest;
use packages\UseCase\MyPage\Recruitment\DeleteRecruitmentUseCaseInterface;
use packages\UseCase\MyPage\Recruitment\EditRecruitmentRequest;

class DeleteRecruitmentInteractor implements DeleteRecruitmentUseCaseInterface
{
    /** @var RecruitmentRepositoryInterface */
    private $recruitmentRepository;

    public function __construct(RecruitmentRepositoryInterface $recruitmentRepository)
    {
        $this->recruitmentRepository = $recruitmentRepository;
    }

    public function handle(DeleteRecruitmentRequest $request): void
    {
        $this->recruitmentRepository->delete($request);
    }
}
