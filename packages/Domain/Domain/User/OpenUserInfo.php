<?php
declare(strict_types=1);

namespace packages\Domain\Domain\User;

use packages\Domain\Domain\Common\Prefecture;
use packages\Domain\Domain\Common\ValueObjectOf;

class OpenUserInfo
{
    use ValueObjectOf;

    /** @var int */
    private $user_id;

    /** @var string $nickname */
    private $nickname;

    /** @var Gender $gender */
    public $gender;

    /** @var Prefecture $prefecture */
    public $prefecture;

    /** @var BirthDay $birthday */
    public $birthday;

    /**
     * ParticipantInfo constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user_id    = $user->getId();
        $this->nickname   = $user->getNickName();
        $this->gender     = $user->getGender();
        $this->prefecture = $user->getPrefecture();
        $this->birthday   = $user->getBirthDay();
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function getGender(): Gender
    {
        return $this->gender;
    }

    public function getGenderValue(): string
    {
        return $this->gender->getValue();
    }

    public function getPrefecture(): Prefecture
    {
        return $this->prefecture;
    }

    public function getBirthDay(): BirthDay
    {
        return $this->birthday;
    }

    public function getUserAge(): int
    {
        return $this->birthday->calculateAge()
                              ->getValue();
    }
}
