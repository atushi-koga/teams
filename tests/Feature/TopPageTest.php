<?php

namespace Tests\Feature;

use App\Eloquent\EloquentRecruitment;
use App\Eloquent\EloquentUser;
use Artisan;
use packages\Domain\Domain\Recruitment\Recruitment;
use packages\Domain\Domain\Recruitment\RecruitmentRepositoryInterface;
use packages\Domain\Domain\Recruitment\TopRecruitment;
use packages\Domain\Domain\User\BrowsingRestriction;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TopPageTest extends TestCase
{
    use RefreshDatabase;

    /** @var EloquentUser $user */
    private $user;

    /** @var EloquentRecruitment $recruitment */
    private $recruitment;

    public function setUp(): void
    {
        parent::setUp();

        $this->setInitData();
        $this->user        = factory(EloquentUser::class)->create();
        $this->recruitment = factory(EloquentRecruitment::class)->create();
    }

    /**
     * マイページトップ画面が表示される事を確認
     *
     * @return void
     */
    public function testCanDisplayTop()
    {
        $response = $this->get('/');
        $response->assertStatus(200)
                 ->assertViewIs('top.index');
    }

    public function testCanCallSearchForTop()
    {
        /** @var Recruitment $recruitment */
        $recruitment = $this->recruitment->toModel();
        $createUser  = $this->user->toModel();

        $topRecruitments[] = TopRecruitment::ofByArray([
            'recruitment' => $recruitment,
            'createUser'  => $createUser,
        ]);

        $mock = $this->createMock(RecruitmentRepositoryInterface::class);
        $mock->expects($this->once())
             ->method('searchForTop')
             ->willReturn($topRecruitments);

        $this->instance(RecruitmentRepositoryInterface::class, $mock);

        $this->get('/');
    }

    public function testCanDisplayRecruitmentInfo()
    {
        /** @var Recruitment $recruitment */
        $recruitment = $this->recruitment->toModel();
        $recruitment->setEntryCount(3);
        $createUser = $this->user->toModel();

        $topRec = TopRecruitment::ofByArray([
            'recruitment' => $recruitment,
            'createUser'  => $createUser,
        ]);

        $this->assertEquals(2019, $topRec->getHeldYear());
        // @todo: Docker container osのTZをAsia/Tokyoに設定する
        //        $this->assertEquals('10/3(木)', $topRec->getHeldDate());
        $this->assertEquals('田中tarou', $topRec->getCreateUserNickname());
        $this->assertEquals(1, $topRec->getRecruitmentId());
        $this->assertEquals('神奈川県', $topRec->getHeldPrefecture());
        $this->assertEquals('丹沢大山に登ろう', $topRec->getTitle());
        $this->assertEquals('丹沢大山', $topRec->getMount());
        $this->assertEquals(3, $topRec->getEntryCount());
        $this->assertEquals(5, $topRec->getCapacity());
    }
}
