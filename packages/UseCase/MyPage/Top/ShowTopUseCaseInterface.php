<?php
declare(strict_types=1);

namespace packages\UseCase\MyPage\Top;

use packages\Domain\Domain\User\BrowsingRestriction;

interface ShowTopUseCaseInterface
{
    /**
     * @param BrowsingRestriction $browsingRestriction
     * @return ShowTopResponse
     */
    public function handle(BrowsingRestriction $browsingRestriction);
}
