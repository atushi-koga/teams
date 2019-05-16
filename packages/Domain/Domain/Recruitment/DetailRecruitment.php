<?php
declare(strict_types=1);

namespace packages\Domain\Domain\Recruitment;

use packages\Domain\Domain\User\ParticipantInfo;

class DetailRecruitment
{
    /** @var Recruitment */
    public $recruitment;

    /** @var ParticipantInfo */
    public $createUserInfo;

    /** @var int */
    private $browsing_user_id;

    /** @var ParticipantInfo[] */
    public $participantInfoList;

    /**
     * DetailRecruitment constructor.
     *
     * @param Recruitment     $recruitment
     * @param ParticipantInfo $createUserInfo
     * @param int             $browsing_user_id
     * @param array           $participantInfoList
     */
    public function __construct(
        Recruitment $recruitment,
        ParticipantInfo $createUserInfo,
        int $browsing_user_id,
        array $participantInfoList)
    {
        $this->recruitment         = $recruitment;
        $this->createUserInfo      = $createUserInfo;
        $this->browsing_user_id    = $browsing_user_id;
        $this->participantInfoList = $participantInfoList;
    }

    /**
     * @return bool
     */
    public function browsingUserIsCreateUser(): bool
    {
        return $this->browsing_user_id === $this->recruitment->getCreateUserId();
    }

    /**
     * @return int
     */
    public function getBrowsingUserId(): int
    {
        return $this->browsing_user_id;
    }
}
