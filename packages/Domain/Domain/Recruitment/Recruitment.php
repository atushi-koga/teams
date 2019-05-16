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

    /** @var Capacity */
    private $deadline;

    /** @var string $requirement */
    private $requirement;

    /** @var string $belongings */
    private $belongings;

    /** @var string $notes */
    private $notes;

    // @todo: UserId Value Objectに置き換える
    /** @var int */
    private $createUserId;

    /**
     * EloquentRecruitment constructor.
     *
     * @param string     $title
     * @param string     $mount
     * @param Prefecture $prefecture
     * @param string     $schedule
     * @param Date       $date
     * @param Capacity   $capacity
     * @param Date       $deadline
     * @param string     $requirement
     * @param string     $belongings
     * @param string     $notes
     * @param int        $createUserId
     */
    public function __construct(
        string $title,
        string $mount,
        Prefecture $prefecture,
        string $schedule,
        Date $date,
        Capacity $capacity,
        Date $deadline,
        string $requirement,
        string $belongings,
        string $notes,
        int $createUserId
    ) {
        $this->title        = $title;
        $this->mount        = $mount;
        $this->prefecture   = $prefecture;
        $this->schedule     = $schedule;
        $this->date         = $date;
        $this->capacity     = $capacity;
        $this->requirement  = $requirement;
        $this->belongings   = $belongings;
        $this->notes        = $notes;
        $this->deadline     = $deadline;
        $this->createUserId = $createUserId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getMount(): string
    {
        return $this->mount;
    }

    /**
     * @return mixed
     */
    public function getPrefectureKey()
    {
        return $this->prefecture->getKey();
    }

    /**
     * @return string
     */
    public function getPrefectureValue(): string
    {
        return $this->prefecture->getValue();
    }

    /**
     * @return string
     */
    public function getSchedule(): string
    {
        return $this->schedule;
    }

    /**
     * @return Date
     */
    public function getDate(): Date
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getFormatDate(): string
    {
        return $this->date->getFormatDate();
    }

    /**
     * @return int
     */
    public function getCapacityValue(): int
    {
        return $this->capacity->getValue();
    }

    /**
     * @return Date
     */
    public function getDeadline(): Date
    {
        return $this->deadline;
    }

    /**
     * @return string
     */
    public function getFormatDeadline(): string
    {
        return $this->deadline->getFormatDate();
    }

    /**
     * @return string
     */
    public function getRequirement(): string
    {
        return $this->requirement;
    }

    /**
     * @return string
     */
    public function getBelongings(): string
    {
        return $this->belongings;
    }

    /**
     * @return string
     */
    public function getNotes(): string
    {
        return $this->notes;
    }


    /**
     * @return int
     */
    public function getCreateUserId(): int
    {
        return $this->createUserId;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    public static function ofByArray(array $attributes): self
    {
        return new self(
            $attributes['title'],
            $attributes['mount'],
            Prefecture::of($attributes['prefecture']),
            $attributes['schedule'],
            Date::ofFormatDate($attributes['date']),
            Capacity::of($attributes['capacity']),
            Date::ofFormatDate($attributes['deadline']),
            $attributes['requirement'],
            $attributes['belongings'],
            $attributes['notes'],
            $attributes['create_id']
        );
    }
}
