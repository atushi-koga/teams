<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Account;

use packages\Domain\Domain\Common\Prefecture;
use packages\Domain\Domain\User\Email;
use packages\Domain\Domain\User\Password;

class AccountEditRequest
{
    /** @var int $userId */
    private $userId;

    /** @var string $nickname */
    private $nickname;

    /** @var Prefecture $prefecture */
    private $prefecture;

    /** @var Email $email */
    private $email;

    /** @var Password $password */
    private $password;

    /**
     * AccountEditRequest constructor.
     *
     * @param int         $userId
     * @param string      $nickname
     * @param Prefecture  $prefecture
     * @param Email       $email
     * @param string|null $password
     */
    public function __construct(
        int $userId,
        string $nickname,
        Prefecture $prefecture,
        Email $email,
        ?string $password
    ) {
        $this->userId     = $userId;
        $this->nickname   = $nickname;
        $this->prefecture = $prefecture;
        $this->email      = $email;

        if (!is_null($password)) {
            $this->password = Password::ofRowPassword($password);
        }
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function getPrefectureKey(): int
    {
        return $this->prefecture->getKey();
    }

    public function getEmail(): string
    {
        return $this->email->getValue();
    }

    public function getHashPass(): ?string
    {
        return $this->password ? $this->password->getHash() : null;
    }
}
