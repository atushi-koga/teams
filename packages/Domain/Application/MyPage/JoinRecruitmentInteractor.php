<?php
declare(strict_types=1);

namespace packages\Domain\Application\MyPage;

use packages\Domain\Domain\Recruitment\UsersRecruitmentRepositoryInterface;
use packages\UseCase\MyPage\Recruitment\JoinRecruitmentUseCaseInterface;

class JoinRecruitmentInteractor implements JoinRecruitmentUseCaseInterface
{
    
    private $usersRecruitmentRepository;

    public function __construct(UsersRecruitmentRepositoryInterface $usersRecruitmentRepository)
    {
        $this->usersRecruitmentRepository = $usersRecruitmentRepository;
    }

    public function handle(int $id): void
    {
    }
}
