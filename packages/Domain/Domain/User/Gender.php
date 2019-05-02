<?php

namespace packages\Domain\Domain\User;

use packages\Domain\Domain\Common\EnumTrait;
use packages\Domain\Domain\Common\ValueObjectOf;

class Gender
{
    use EnumTrait;
    use ValueObjectOf;

    /**
     * @return array
     */
    public static function Enum()
    {
        return [
            1 => '男性',
            2 => '女性',
        ];
    }
}
