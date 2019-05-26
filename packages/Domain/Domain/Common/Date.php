<?php
declare(strict_types=1);

namespace packages\Domain\Domain\Common;

use Carbon\Carbon;

class Date
{
    use ValueObjectOf;

    /** @var Carbon */
    private $value;

    /**
     * Date constructor.
     *
     * @param Carbon $value
     */
    public function __construct(Carbon $value)
    {
        $this->value = $value;
    }

    public function getValue(): Carbon
    {
        return $this->value;
    }

    public static function ofFormatDate(string $value): self
    {
        //@todo: 日付形式が無効であればthrow exceptionとする

        return new self(Carbon::parse($value));
    }

    public function getFormatDate(): string
    {
        return $this->value->format('Y-n-j');
    }

    public function getYear(): int
    {
        return $this->value->year;
    }

    public function getDateWithDayOfWeek(): string
    {
        $date       = $this->value->format('n/j');
        $dayOfWeek = $this->value->formatLocalized('%a');

        return "{$date}({$dayOfWeek})";
    }

}
