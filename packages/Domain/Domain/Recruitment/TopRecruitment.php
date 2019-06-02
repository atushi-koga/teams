<?php
declare(strict_types=1);

namespace packages\Domain\Domain\Recruitment;

use packages\Domain\Domain\User\User;

class TopRecruitment
{
    /** @var Recruitment */
    public $recruitment;

    /** @var User */
    public $createUser;

    public function __construct(Recruitment $recruitment, User $createUser)
    {
        $this->recruitment = $recruitment;
        $this->createUser  = $createUser;
    }

    public static function ofByArray(array $attributes): self
    {
        return new self(
            $attributes['recruitment'],
            $attributes['createUser']
        );
    }

    public function getRecruitmentId(): int
    {
        return $this->recruitment->getId();
    }

    public function getHeldYear(): int
    {
        return $this->recruitment->getDate()
                                 ->getYear();
    }

    public function getHeldDate(): string
    {
        return $this->recruitment->getDate()
                                 ->getDateWithDayOfWeek();
    }

    public function getCreateUserId(): int
    {
        return $this->createUser->getId();
    }

    public function getCreateUserNickname(): string
    {
        return $this->createUser->getNickName();
    }

    public function getHeldPrefecture(): string
    {
        return $this->recruitment->getPrefectureValue();
    }

    public function getTitle(): string
    {
        return $this->recruitment->getTitle();
    }

    public function getMount(): string
    {
        return $this->recruitment->getMount();
    }

    public function getCapacity(): int
    {
        return $this->recruitment->getCapacityValue();
    }

    public function getEntryCount(): int
    {
        return $this->recruitment->getEntryCount();
    }

    public function afterDeadline(): bool
    {
        return $this->recruitment->getDeadline()
                                 ->afterDeadline();
    }
}
