<?php
declare(strict_types=1);

namespace packages\UseCase\Top;

use packages\Domain\Domain\User\BrowsingRestriction;

interface ShowTopUseCaseInterface
{
    /**
     * @return ShowTopResponse
     */
    public function handle();
}
