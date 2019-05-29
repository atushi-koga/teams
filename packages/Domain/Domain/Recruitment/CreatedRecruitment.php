<?php
declare(strict_types=1);

namespace packages\Domain\Domain\Recruitment;

use packages\Domain\Domain\User\User;

class CreatedRecruitment
{
    /** @var Recruitment */
    public $recruitment;

    public function __construct(Recruitment $recruitment)
    {
        $this->recruitment = $recruitment;
    }

    public static function of(Recruitment $recruitment): self
    {
        return new self($recruitment);
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
