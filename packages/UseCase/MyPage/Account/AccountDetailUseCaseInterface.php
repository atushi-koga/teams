<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Account;

interface AccountDetailUseCaseInterface
{
    /**
     * @param AccountDetailRequest $request
     */
    public function handle(AccountDetailRequest $request);
}
