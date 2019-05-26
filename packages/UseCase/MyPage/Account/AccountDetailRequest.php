<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Account;

class AccountDetailRequest
{
    /** @var int $userId */
    public $userId;

    /**
     * AccountDetailRequest constructor.
     *
     * @param int $userId
     */
    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }
}
