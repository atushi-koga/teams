<?php
declare(strict_types=1);

namespace packages\Domain\Domain\User;

use packages\Domain\Domain\Common\EnumTrait;
use packages\Domain\Domain\Common\ValueObjectOf;

class BirthDayList
{
    use EnumTrait;
    use ValueObjectOf;

    /**
     * @return array
     */
    public static function Enum(): array
    {
        $days = [];
        for ($i = 1; $i <= 31; $i++) {
            $days[$i] = $i;
        }

        return $days;
    }
}
