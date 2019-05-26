<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Account;

interface ShowAccountEditUseCaseInterface
{
    /**
     * @param ShowAccountEditRequest $request
     */
    public function handle(ShowAccountEditRequest $request);
}
