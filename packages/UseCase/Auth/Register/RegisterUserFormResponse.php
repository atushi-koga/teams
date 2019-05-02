<?php

namespace packages\UseCase\Auth\Register;

class RegisterUserFormResponse
{
    /** @var array */
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
