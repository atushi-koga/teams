<?php

namespace packages\Domain\Domain\User;

use packages\Domain\Domain\Common\ValueObjectOf;

class Email
{
    use ValueObjectOf;

    /** @var string  */
    private $value;

    public function __construct(string $email)
    {
        $this->value = $email;
    }

    public function getValue()
    {
        return $this->value;
    }
}
