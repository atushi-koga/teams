<?php

namespace packages\Domain\Domain\User;

use packages\Domain\Domain\Common\EnumTrait;

class Gender
{
    use EnumTrait;

    const ENUM = [
        1 => '男性',
        2 => '女性',
    ];
}
