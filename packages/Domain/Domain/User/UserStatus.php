<?php
declare(strict_types=1);

namespace packages\Domain\Domain\User;

use packages\Domain\Domain\Common\EnumTrait;
use packages\Domain\Domain\Common\ValueObjectOf;

class UserStatus
{
    use EnumTrait;
    use ValueObjectOf;

    /** @var int */
    const ADMIN_STATUS = 10;

    /** @var int */
    const PARTICIPANT_STATUS = 100;

    /**
     * @return array
     */
    public static function Enum(): array
    {
        return [
            self::ADMIN_STATUS       => '管理者',
            self::PARTICIPANT_STATUS => '参加者',
        ];
    }
}
