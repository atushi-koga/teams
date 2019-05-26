<?php
declare(strict_types=1);

namespace packages\UseCase\Top;

class DetailRecruitmentRequest
{
    /** @var int */
    public $recruitmentId;

    /** @var int|null */
    public $browsingUserId;

    /**
     * DetailRecruitmentRequest constructor.
     *
     * @param int      $recruitmentId
     * @param int|null $browsingUserId
     */
    public function __construct(
        int $recruitmentId,
        ?int $browsingUserId
    ) {
        $this->recruitmentId  = $recruitmentId;
        $this->browsingUserId = $browsingUserId;
    }

    public function getRecruitmentId(): int
    {
        return $this->recruitmentId;
    }

    public function getBrowsingUserId(): ?int
    {
        return $this->browsingUserId;
    }
}
