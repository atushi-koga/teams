<?php

declare(strict_types=1);

namespace packages\Domain\Domain\User;

use InvalidArgumentException;
use packages\Domain\Domain\Common\ValueObjectOf;

class Age
{
    use ValueObjectOf;

    /** @var int */
    private $value;

    const MAX_AGE = 150;

    public function __construct(int $value)
    {
        if (!self::isValidateValue($value)) {
            throw new InvalidArgumentException('class' . __CLASS__ . " value:{$value}");
        }

        $this->value = $value;
    }

    public static function isValidateValue(int $value): bool
    {
        return $value < self::MAX_AGE;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
