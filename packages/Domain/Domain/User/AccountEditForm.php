<?php
declare(strict_types=1);

namespace packages\Domain\Domain\User;

use packages\Domain\Domain\Common\ValueObjectOf;

class AccountEditForm
{
    use ValueObjectOf;

    /** @var User $user */
    private $user;

    /** @var array $prefectures */
    private $prefectures;

    public function __construct(User $user, array $prefectures)
    {
        $this->user        = $user;
        $this->prefectures = $prefectures;
    }

    public function getNickname(): string
    {
        return $this->user->getNickName();
    }

    public function getPrefectureList(): array
    {
        return $this->prefectures;
    }

    public function getPrefectureKey(): int
    {
        return $this->user->getPrefecture()
                          ->getKey();
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
