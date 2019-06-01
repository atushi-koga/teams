<?php

namespace packages\Domain\Domain\User;

use Hash;
use packages\Domain\Domain\Common\ValueObjectOf;

class Password
{
    use ValueObjectOf;

    /** @var string */
    private $value;

    public function __construct(string $hashPassword)
    {
        $this->value = $hashPassword;
    }

    public function getHash()
    {
        return $this->value;
    }

    public static function ofRowPassword(string $row): self
    {
        return new self(Hash::make($row));
    }
}
