<?php
declare(strict_types=1);

namespace packages\Domain\Domain\User;

use packages\Domain\Domain\Common\ValueObjectOf;

class AccountDetail
{
    use ValueObjectOf;

    /** @var User $user */
    private $user;

    /**
     * AccountDetail constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getNickname(): string
    {
        return $this->user->getNickName();
    }

    public function getPrefectureValue(): string
    {
        return $this->user->getPrefecture()
                          ->getValue();
    }

    public function getGenderValue(): string
    {
        return $this->user->getGender()
                          ->getValue();
    }

    public function getUserAge(): int
    {
        return $this->user->getBirthDay()
                          ->calculateAge()
                          ->getValue();
    }

    public function getEmail(): string
    {
        return $this->user->getEmail();
    }

    public function getIntroduction(): ?string
    {
        return $this->user->getIntroduction();
    }
}
