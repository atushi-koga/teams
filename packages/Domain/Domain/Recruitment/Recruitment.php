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
        int $createUserId
    ) {
        $this->title        = $title;
        $this->mount        = $mount;
        $this->prefecture   = $prefecture;
        $this->schedule     = $schedule;
        $this->date         = $date;
        $this->capacity     = $capacity;
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
}
