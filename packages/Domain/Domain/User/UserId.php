<?php
declare(strict_types=1);

namespace packages\Domain\Domain\User;

use InvalidArgumentException;
use packages\Domain\Domain\Common\ValueObjectOf;

class UserId
{
    use ValueObjectOf;

    private $value;

    public function __construct(int $value)
    {
        if (!self::isValidateValue($value)) {
            throw new InvalidArgumentException('class' . __CLASS__ . " value:{$value}");
        }

        $this->value = $value;
    }

    public static function isValidateValue(int $value): bool
    {
        return $value > 0;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
