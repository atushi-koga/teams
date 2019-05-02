<?php

namespace packages\Domain\Application\Auth\Register;

use packages\Domain\Domain\Prefecture\Prefecture;
use packages\Domain\Domain\User\Gender;
use packages\UseCase\Auth\Register\RegisterUserFormResponse;
use packages\UseCase\Auth\Register\RegisterUserFormUseCaseInterface;
use PrefectureRepositoryInterface;

class RegisterUserFormInteractor implements RegisterUserFormUseCaseInterface
{
    private $prefectureRepository;

    public function __construct(PrefectureRepositoryInterface $prefectureRepository)
    {
        $this->prefectureRepository = $prefectureRepository;
    }

    /**
     * @return RegisterUserFormResponse
     */
    public function handle(): RegisterUserFormResponse
    {
        /** @var Prefecture[] $prefectures */
        $prefectures = $this->prefectureRepository->all();

        /** @var array $genders */
        $genders = Gender::ENUM;

        return new RegisterUserFormResponse($prefectures, $genders);
    }
}
