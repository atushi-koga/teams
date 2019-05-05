<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Recruitment;

class NewRecruitmentFormResponse
{
    /** @var array */
    public $prefectures;

    /** @var array */
    public $genders;

    /**
     * NewRecruitmentFormResponse constructor.
     *
     * @param array $prefectures
     * @param array $genders
     */
    public function __construct(array $prefectures, array $genders)
    {
        $this->prefectures = $prefectures;
        $this->genders     = $genders;
    }
}
