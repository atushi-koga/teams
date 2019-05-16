<?php
declare(strict_types=1);

namespace packages\UseCase\Auth\Register;

class RegisterUserFormResponse
{
    /** @var array */
    public $prefectures;

    /** @var array */
    public $genders;

    /** @var array $birthYear */
    public $birthYearList;

    /** @var array $birthMonth */
    public $birthMonthList;

    /** @var array $birthDay */
    public $birthDayList;

    /**
     * RegisterUserFormResponse constructor.
     *
     * @param array $prefectures
     * @param array $genders
     * @param array $birthYearList
     * @param array $birthMonthList
     * @param array $birthDayList
     */
    public function __construct(
        array $prefectures,
        array $genders,
        array $birthYearList,
        array $birthMonthList,
        array $birthDayList
    ) {
        $this->prefectures    = $prefectures;
        $this->genders        = $genders;
        $this->birthYearList  = $birthYearList;
        $this->birthMonthList = $birthMonthList;
        $this->birthDayList   = $birthDayList;
    }

}
