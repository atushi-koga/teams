<?php
declare(strict_types=1);

namespace packages\Domain\Domain\Recruitment;

use packages\Domain\Domain\Common\Date;
use packages\Domain\Domain\Common\Prefecture;

class Recruitment
{
    /** @var int */
    private $id;

    /** @var string */
    private $title;

    /** @var string */
    private $mount;

    /** @var Prefecture */
    private $prefecture;

    /** @var string */
    private $schedule;

    /** @var Date */
    private $date;

    /** @var Capacity */
    private $capacity;

    /** @var Deadline */
    private $deadline;

    /** @var string $requirement */
    private $requirement;

    /** @var string $belongings */
    private $belongings;

    /** @var string $notes */
    private $notes;

    /** @var int */
    private $createUserId;

    /** @var int */
    private $count;

    /**
     * EloquentRecruitment constructor.
     *
     * @param string      $title
     * @param string      $mount
     * @param Prefecture  $prefecture
     * @param string      $schedule
     * @param Date        $date
     * @param Capacity    $capacity
     * @param Deadline    $deadline
     * @param string      $requirement
     * @param null|string $belongings
     * @param null|string $notes
     */
    public function __construct(
        string $title,
        string $mount,
        Prefecture $prefecture,
        string $schedule,
        Date $date,
        Capacity $capacity,
        Deadline $deadline,
        string $requirement,
        ?string $belongings,
        ?string $notes
    ) {
        $this->title       = $title;
        $this->mount       = $mount;
        $this->prefecture  = $prefecture;
        $this->schedule    = $schedule;
        $this->date        = $date;
        $this->capacity    = $capacity;
        $this->deadline    = $deadline;
        $this->requirement = $requirement;
        $this->belongings  = $belongings;
        $this->notes       = $notes;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getMount(): string
    {
        return $this->mount;
    }

    public function getPrefectureKey()
    {
        return $this->prefecture->getKey();
    }

    public function getPrefectureValue(): string
    {
        return $this->prefecture->getValue();
    }

    public function getSchedule(): string
    {
        return $this->schedule;
    }

    public function getDate(): Date
    {
        return $this->date;
    }

    public function getFormatDate(): string
    {
        return $this->date->getFormatDate();
    }

    public function getCapacityValue(): int
    {
        return $this->capacity->getValue();
    }

    public function getDeadline(): Deadline
    {
        return $this->deadline;
    }

    public function getFormatDeadline(): string
    {
        return $this->deadline->getFormatDate();
    }

    public function getRequirement(): string
    {
        return $this->requirement;
    }

    public function getBelongings(): ?string
    {
        return $this->belongings;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function getCreateUserId(): int
    {
        return $this->createUserId;
    }

    public function getEntryCount(): int
    {
        return $this->count;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setEntryCount(int $count)
    {
        $this->count = $count;
    }

    public function setCreateId(int $userId)
    {
        $this->createUserId = $userId;
    }

    public static function ofByArray(array $attributes): self
    {
        $recruitment = new self(
            $attributes['title'],
            $attributes['mount'],
            Prefecture::of(intval($attributes['prefecture'])),
            $attributes['schedule'],
            Date::ofFormatDate($attributes['date']),
            Capacity::of(intval($attributes['capacity'])),
            Deadline::ofFormatDate($attributes['deadline']),
            $attributes['requirement'],
            $attributes['belongings'],
            $attributes['notes']
        );

        if (isset($attributes['create_id'])) {
            $recruitment->setCreateId($attributes['create_id']);
        }

        return $recruitment;
    }
}
