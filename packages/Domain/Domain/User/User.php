<?php
declare(strict_types=1);

namespace packages\Domain\Domain\User;

use Carbon\Carbon;
use packages\Domain\Domain\Common\Prefecture;

class User
{
    /** @var int */
    private $id;

    /** @var string */
    private $nickname;

    /** @var Prefecture */
    private $prefecture;

    /** @var Gender */
    private $gender;

    /** @var BirthDay */
    private $birthday;

    /** @var Email */
    private $email;

    /** @var Password */
    private $password;

    /**
     * User constructor.
     *
     * @param string     $nickname
     * @param Prefecture $prefecture
     * @param Gender     $gender
     * @param BirthDay   $birthday
     * @param Email      $email
     */
    public function __construct(
        string $nickname,
        Prefecture $prefecture,
        Gender $gender,
        BirthDay $birthday,
        Email $email
    ) {
        $this->nickname   = $nickname;
        $this->prefecture = $prefecture;
        $this->gender     = $gender;
        $this->birthday   = $birthday;
        $this->email      = $email;
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
    public function getNickName(): string
    {
        return $this->nickname;
    }

    public function getPrefecture(): Prefecture
    {
        return $this->prefecture;
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

    public function getGender(): Gender
    {
        return $this->gender;
    }

    /**
     * @return mixed
     */
    public function getGenderKey()
    {
        return $this->gender->getKey();
    }

    /**
     * @return string
     */
    public function getGenderValue(): string
    {
        return $this->gender->getValue();
    }

    /**
     * @return Carbon
     */
    public function getBirthDate(): Carbon
    {
        return $this->birthday->getBirthDate();
    }

    public function getBirthDay(): BirthDay
    {
        return $this->birthday;
    }

    /**
     * @return string
     */
    public function getFormatBirthDate(): string
    {
        return $this->birthday->getFormatBirthDate();
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email->getValue();
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password->getHash();
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setPassword(Password $password)
    {
        $this->password = $password;
    }

    public static function ofByArray(array $attributes): self
    {
        $user = new self(
            $attributes['nickname'],
            Prefecture::of(intval($attributes['prefecture'])),
            Gender::of(intval($attributes['gender'])),
            BirthDay::ofFormat($attributes['birthday']),
            Email::of($attributes['email'])
        );

        if (isset($attributes['id'])) {
            $user->setId($attributes['id']);
        }

        if (isset($attributes['password'])) {
            $user->setPassword(Password::of($attributes['password']));
        }

        return $user;
    }
}
