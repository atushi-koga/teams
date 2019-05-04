<?php
declare(strict_types=1);

namespace packages\Domain\Domain\Recruitment;

use InvalidArgumentException;
use packages\Domain\Domain\Common\ValueObjectOf;

class Capacity
{
    use ValueObjectOf;

    const MAX_CAPACITY = 100;

    /** @var int */
    private $value;

    /**
     * Capacity constructor.
     *
     * @param int $value
     */
    public function __construct(int $value)
    {
        if (!self::isValidatedValue($value)) {
            throw new InvalidArgumentException('class' . __CLASS__ . ", value:{$value}, over max capacity");
        }

        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     * @return bool
     */
    public static function isValidatedValue(int $value)
    {
        return $value < self::MAX_CAPACITY;
    }
}
