<?php

namespace packages\Domain\Domain\Common;

use BadMethodCallException;
use InvalidArgumentException;

trait EnumTrait
{
    private $key;

    /** @var string */
    private $value;

    final public function __construct($key)
    {
        if (!self::isValidateValue($key)) {
            throw new InvalidArgumentException();
        }

        $this->key   = $key;
        $this->value = self::ENUM[$key];
    }

    /**
     * @param $key
     * @return bool
     */
    final public static function isValidateValue($key)
    {
        return array_key_exists($key, self::ENUM);
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
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    final public function __toString()
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
