<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Top;

class ShowTopResponse
{
    public $recruitment;

    /**
     * ShowTopResponse constructor.
     *
     * @param array $recruitmentList
     */
    public function __construct(array $recruitmentList)
    {
        $this->recruitment = $recruitmentList;
    }
}
