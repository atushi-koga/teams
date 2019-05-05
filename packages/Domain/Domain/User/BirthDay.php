<?php
declare(strict_types=1);

namespace packages\Domain\Domain\User;

use Carbon\Carbon;
use packages\Domain\Domain\Common\ValueObjectOf;

class BirthDay
{
    use ValueObjectOf;

    /** @var Carbon  */
    private $birth_date;

    public function __construct(Carbon $birth_date)
    {
        $this->birth_date = $birth_date;
    }

    /**
     * @return Carbon
     */
    public function getBirthDate()
    {
        return $this->birth_date;
    }

    /**
     * @return string
     */
    public function getFormatBirthDate()
    {
        return $this->birth_date->format('Y-n-j');
    }

    /**
     * @param string $birth_year
     * @param string $birth_month
     * @param string $birth_day
     * @return BirthDay
     */
    public static function assemble(string $birth_year, string $birth_month, string $birth_day): self
    {
        //@todo: 日付形式が無効であればthrow exceptionとする

        return new self(Carbon::create($birth_year, $birth_month,$birth_day));
    }

    /**
     * @param string $birthday
     * @return BirthDay
     */
    public static function ofFormat(string $birthday): self
    {
        //@todo: 日付形式が無効であればthrow exceptionとする

        return new self(Carbon::parse($birthday));
    }

    /**
     * @return Age
     */
    public function calculateAge(): Age
    {
        return Age::of($this->birth_date->age);
    }
}
