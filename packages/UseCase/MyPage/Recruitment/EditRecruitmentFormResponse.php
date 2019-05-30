<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Recruitment;

use packages\Domain\Domain\Recruitment\Recruitment;

class EditRecruitmentFormResponse
{
    /** @var Recruitment $recruitment */
    private $recruitment;

    /** @var array */
    private $prefectures;

    public function __construct(Recruitment $recruitment, array $prefectures)
    {
        $this->recruitment = $recruitment;
        $this->prefectures = $prefectures;
    }

    public function getRecruitment(): Recruitment
    {
        return $this->recruitment;
    }

    public function getPrefectures(): array
    {
        return $this->prefectures;
    }
}
