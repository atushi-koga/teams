<?php
declare(strict_types=1);

namespace packages\UseCase\Top;

use packages\Domain\Domain\Recruitment\TopRecruitment;

class ShowTopResponse
{
    /** @var TopRecruitment[]  */
    public $recruitment;

    /**
     * ShowTopResponse constructor.
     *
     * @param TopRecruitment[] $topRecruitments
     */
    public function __construct(array $topRecruitments)
    {
        $this->recruitment = $topRecruitments;
    }
}
