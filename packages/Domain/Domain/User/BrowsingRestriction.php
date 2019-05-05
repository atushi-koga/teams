<?php
declare(strict_types=1);

namespace packages\Domain\Domain\User;

class BrowsingRestriction
{
    /** @var Age */
    public $age;

    /** @var Gender */
    public $gender;

    /**
     * BrowsingRestriction constructor.
     *
     * @param Age    $age
     * @param Gender $gender
     */
    public function __construct(Age $age, Gender $gender)
    {
        $this->age    = $age;
        $this->gender = $gender;
    }

    /**
     * @param Age    $age
     * @param Gender $gender
     * @return BrowsingRestriction
     */
    public static function of(Age $age, Gender $gender): self
    {
        return new self($age, $gender);
    }
}
