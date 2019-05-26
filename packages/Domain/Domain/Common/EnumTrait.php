<?php
declare(strict_types=1);

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
            throw new InvalidArgumentException('class' . __CLASS__ . " key:{$key}");
        }

        $this->key   = $key;
        $this->value = self::Enum()[$key];
    }

    final public static function isValidateValue($key): bool
    {
        return self::existKeyStrictly($key);
    }

    final public static function existKeyStrictly($key): bool
    {
        // array_key_exists()では型チェックができないため、キーを取り出しin_array()を使用
        $keys = array_keys(self::Enum());

        return in_array($key, $keys, true);
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
