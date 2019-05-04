<?php
declare(strict_types=1);

namespace packages\Domain\Application\MyPage;

use packages\Domain\Domain\Common\Prefecture;
use packages\Domain\Domain\User\Gender;
use packages\UseCase\MyPage\Recruitment\NewRecruitmentFormResponse;
use packages\UseCase\MyPage\Recruitment\NewRecruitmentFormUseCaseInterface;

class NewRecruitmentFormInteractor implements NewRecruitmentFormUseCaseInterface
{
    /**
     * @return NewRecruitmentFormResponse
     */
    public function handle(): NewRecruitmentFormResponse
    {
        /** @var array $prefectures */
        $prefectures = Prefecture::Enum();

        /** @var array $genders */
        $genders = Gender::Enum();

        return new NewRecruitmentFormResponse($prefectures, $genders);
    }
}
