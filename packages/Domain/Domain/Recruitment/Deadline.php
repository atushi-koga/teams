<?php
declare(strict_types=1);

namespace packages\Domain\Domain\Recruitment;

use Carbon\Carbon;
use InvalidArgumentException;
use packages\Domain\Domain\Common\Date;
use packages\Domain\Domain\Common\ValueObjectOf;

class Deadline extends Date
{
    /**
     * 募集締め切りの翌日以降かどうかを判定
     *
     * @return bool
     */
    public function afterDeadline(): bool
    {
        $deadline = $this->value;

        return Carbon::today()
                     ->gt($deadline);
    }

}
