<?php
declare(strict_types=1);

namespace packages\Domain\Domain\Common;

use Carbon\Carbon;

class Date
{
    use ValueObjectOf;

    /** @var Carbon  */
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

    /**
     * @param string $value
     * @return Date
     */
    public static function ofFormatDate(string $value): self
    {
        //@todo: 日付形式が無効であればthrow exceptionとする

        return new self(Carbon::parse($value));
    }

    /**
     * @return string
     */
    public function getFormatDate():string
    {
        return $this->value->format('Y-n-j');
    }
}
