<?php
declare(strict_types=1);

namespace packages\Domain\Domain\User;

use packages\Domain\Domain\Common\EnumTrait;
use packages\Domain\Domain\Common\ValueObjectOf;

class BirthMonthList
{
    use EnumTrait;
    use ValueObjectOf;

    /**
     * @return array
     */
    public static function Enum(): array
    {
        $month = [];
        for ($i = 1; $i <= 12; $i++) {
            $month[$i] = $i;
        }

        return $month;
    }
}
