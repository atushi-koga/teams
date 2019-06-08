<?php
declare(strict_types=1);

namespace packages\Domain\Application\MyPage;

use packages\Domain\Domain\Recruitment\Recruitment;
use packages\Domain\Domain\Recruitment\RecruitmentRepositoryInterface;
use packages\UseCase\MyPage\Recruitment\EditRecruitmentRequest;
use packages\UseCase\MyPage\Recruitment\EditRecruitmentUseCaseInterface;

class EditRecruitmentInteractor implements EditRecruitmentUseCaseInterface
{
    /** @var RecruitmentRepositoryInterface */
    private $recruitmentRepository;

    public function __construct(RecruitmentRepositoryInterface $recruitmentRepository)
    {
        $this->recruitmentRepository = $recruitmentRepository;
    }

    /**
     * @param EditRecruitmentRequest $request
     * @return void
     */
    public function handle(EditRecruitmentRequest $request): void
    {
        $this->recruitmentRepository->edit($request);
    }
}
