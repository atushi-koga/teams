<?php

namespace Tests\Feature;

use App\Eloquent\EloquentRecruitment;
use App\Eloquent\EloquentUser;
use packages\Domain\Domain\Recruitment\DetailRecruitment;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DetailRecruitmentTest extends TestCase
{
    use RefreshDatabase;

    /** @var EloquentUser $user */
    private $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->setInitData();
        $this->user = factory(EloquentUser::class)->create([
            'nickname' => '田中tarou'
        ]);
    }

    public function testCanDisplayDetailRecruitmentView()
    {
        $this->withoutExceptionHandling();

        $recruitment = factory(EloquentRecruitment::class)->create();

        $response = $this->get("/recruitment/{$recruitment->id}");

        $response->assertStatus(200)
                 ->assertViewIs('detail_recruitment.index');
    }

//    public function testCanDisplayDetailRecruitmentInfo()
//    {
//        $detailRecruitment = DetailRecruitment::ofByArray(
//            $recruitment,
//            $createUserInfo,
//            $request->getBrowsingUserId(),
//            $participantInfoList
//        );
//    }
}
