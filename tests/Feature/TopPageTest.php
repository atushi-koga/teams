<?php

namespace Tests\Feature;

use App\Eloquent\EloquentUser;
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

    public function setUp(): void
    {
        parent::setUp();

        $this->setInitData();
        $this->user = $this->login();
    }

    /**
     * マイページトップ画面が表示される事を確認
     *
     * @return void
     */
    public function testCanDisplayTop()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/');
        $response->assertStatus(200)
                 ->assertViewIs('top.index');
    }

    public function recruitment()
    {
        return Recruitment::ofByArray([
            'title'       => '丹沢大山に登ろう',
            'mount'       => '丹沢大山',
            'prefecture'  => 14,
            'schedule'    => '伊勢原駅→登山開始→下山完了',
            'date'        => '2019/10/3',
            'capacity'    => 5,
            'deadline'    => '2019/9/28',
            'requirement' => 'ルールを守れる方',
            'belongings'  => '昼食、登山靴、着替類',
            'notes'       => '自己責任でお願いします',
            'create_id'   => 1,
        ]);
    }

    public function testCanCallSearchForTop()
    {
        /** @var Recruitment $recruitment */
        $recruitment = $this->recruitment();
        $recruitment->setId(1);

        $createUser = $this->user->toModel();

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
        $recruitment = $this->recruitment();
        $recruitment->setId(1);
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
