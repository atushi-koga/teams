<?php

namespace packages\Domain\Domain\Common;

use BadMethodCallException;
use InvalidArgumentException;

trait EnumTrait
{
    /** @var mixed */
    private $key;

    /** @var string */
    private $value;

    /** @return array */
    abstract static function Enum();

    /**
     * EnumTrait constructor.
     *
     * @param mixed $key
     */
    final public function __construct($key)
    {
        if (!self::isValidateValue($key)) {
            throw new InvalidArgumentException();
        }

        $this->key   = $key;
        $this->value = self::Enum()[$key];
    }

    /**
     * @param $key
     * @return bool
     */
    final public static function isValidateValue($key): bool
    {
        return array_key_exists($key, self::Enum());
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    final public function __toString(): string
    {
        return $this->value;
    }

    /**
     * @param $name
     * @param $value
     */
    final public function __set($name, $value)
    {
        throw new BadMethodCallException('All setter is forbidden');
    }
}
