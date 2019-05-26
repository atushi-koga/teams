<?php
declare(strict_types=1);

namespace packages\Domain\Domain\Recruitment;

use packages\Domain\Domain\User\OpenUserInfo;

class DetailRecruitment
{
    /** @var Recruitment */
    private $recruitment;

    /** @var OpenUserInfo */
    private $createUserInfo;

    /** @var int|null */
    private $browsingUserId;

    /** @var OpenUserInfo[] */
    private $participantInfoList;

    /**
     * DetailRecruitment constructor.
     *
     * @param Recruitment  $recruitment
     * @param OpenUserInfo $createUserInfo
     * @param int          $browsingUserId
     * @param array        $participantInfoList
     */
    public function __construct(
        Recruitment $recruitment,
        OpenUserInfo $createUserInfo,
        ?int $browsingUserId,
        array $participantInfoList)
    {
        $this->recruitment         = $recruitment;
        $this->createUserInfo      = $createUserInfo;
        $this->browsingUserId      = $browsingUserId;
        $this->participantInfoList = $participantInfoList;
    }

    public static function ofByArray(array $attributes): self
    {
        return new self(
            $attributes['recruitment'],
            $attributes['createUserInfo'],
            $attributes['browsingUserId'],
            $attributes['participantInfoList']
        );
    }

    public function getTitle(): string
    {
        return $this->recruitment->getTitle();
    }

    public function getCapacity(): int
    {
        return $this->recruitment->getCapacityValue();
    }

    public function getEntryCount(): int
    {
        return $this->recruitment->getEntryCount();
    }

    public function getSchedule(): string
    {
        return $this->recruitment->getSchedule();
    }

    public function getHeldDate(): string
    {
        return $this->recruitment->getDate()
                                 ->getDateWithDayOfWeek();
    }

    public function getRequirement(): string
    {
        return $this->recruitment->getRequirement();
    }

    public function getBelongings(): ?string
    {
        return $this->recruitment->getBelongings();
    }

    public function getNotes(): ?string
    {
        return $this->recruitment->getNotes();
    }

    public function getCreateUserNickname(): string
    {
        return $this->createUserInfo->getNickName();
    }

    public function getCreateUserId(): int
    {
        return $this->createUserInfo->getUserId();
    }

    public function getHeldDay(): string
    {
        $year = $this->recruitment->getDate()
                                  ->getYear();
        $date = $this->getHeldDate();

        return "{$year}/{$date}";
    }

    public function getHeldPrefecture(): string
    {
        return $this->recruitment->getPrefectureValue();
    }

    public function getParticipantInfoList(): array
    {
        return $this->participantInfoList;
    }

    public function getBrowsingUserId(): ?int
    {
        return $this->browsingUserId;
    }

    public function browsingUserIsCreateUser(): bool
    {
        return $this->browsingUserId === $this->getCreateUserId();
    }

}
