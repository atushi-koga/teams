<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Account;

interface AccountEditUseCaseInterface
{
    /**
     * @param AccountEditRequest $request
     */
    public function handle(AccountEditRequest $request);
}
