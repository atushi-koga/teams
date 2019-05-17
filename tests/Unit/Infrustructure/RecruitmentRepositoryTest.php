<?php

namespace Tests\Unit\Infrustructure;

use App\Eloquent\EloquentUser;
use packages\Domain\Domain\Common\Date;
use packages\Domain\Domain\Common\Prefecture;
use packages\Domain\Domain\Recruitment\Capacity;
use packages\Domain\Domain\Recruitment\Recruitment;
use packages\Domain\Domain\User\UserStatus;
use packages\Infrustructure\Recruitment\RecruitmentRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecruitmentRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     * @throws \Exception
     * @throws \Throwable
     */
    public function testCanCreateRecruitment()
    {
        $repository = new RecruitmentRepository();
        $user       = factory(EloquentUser::class)->create();

        $request = [
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
            'create_id'   => $user->id,
        ];

        $recruitment = Recruitment::ofByArray($request);
        $repository->create($recruitment);

        $this->assertDatabaseHas('recruitment', $request);

        $this->assertDatabaseHas(
            'users_recruitment', [
                'user_id'        => $user->id,
                'recruitment_id' => 1,
                'is_accepted'    => true,
                'user_status'    => UserStatus::ADMIN_STATUS,
            ]
        );
    }
}
