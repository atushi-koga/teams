<?php
declare(strict_types=1);

namespace packages\Domain\Domain\User;

use packages\Domain\Domain\Common\Prefecture;

class ParticipantInfo
{
    /** @var int */
    private $user_id;

    /** @var string */
    private $nickname;

    /** @var Gender */
    public $gender;

    /** @var Prefecture */
    public $prefecture;

    /** @var BirthDay */
    public $birthday;

    /**
     * ParticipantInfo constructor.
     *
     * @param int        $user_id
     * @param string     $nickname
     * @param Gender     $gender
     * @param Prefecture $prefecture
     * @param BirthDay   $birthDay
     */
    public function __construct(
        int $user_id,
        string $nickname,
        Gender $gender,
        Prefecture $prefecture,
        BirthDay $birthDay
    ) {
        $this->user_id    = $user_id;
        $this->nickname   = $nickname;
        $this->gender     = $gender;
        $this->prefecture = $prefecture;
        $this->birthday   = $birthDay;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }
}
