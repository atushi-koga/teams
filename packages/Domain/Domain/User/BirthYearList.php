<?php
declare(strict_types=1);

namespace packages\Domain\Domain\User;

use Carbon\Carbon;
use packages\Domain\Domain\Common\EnumTrait;
use packages\Domain\Domain\Common\ValueObjectOf;

class BirthYearList
{
    use EnumTrait;
    use ValueObjectOf;

    /**
     * @return array
     */
    public static function Enum(): array
    {
        $years       = [];
        $currentYear = Carbon::now()->year;
        for ($i = 1; $i <= 100; $i++) {
            $years[$currentYear] = $currentYear;
            $currentYear--;
        }

        return $years;
    }
}
