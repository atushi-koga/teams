<?php

namespace packages\UseCase\Auth\Register;

use packages\Domain\Domain\Prefecture\Prefecture;

class RegisterUserFormResponse
{
    /** @var Prefecture[] */
    public $prefectures;

    /** @var array */
    public $genders;

    /**
     * RegisterUserFormResponse constructor.
     *
     * @param array $prefectures
     * @param array $genders
     */
    public function __construct(array $prefectures, array $genders)
    {
        $this->prefectures = $prefectures;
        $this->genders     = $genders;
    }

}
