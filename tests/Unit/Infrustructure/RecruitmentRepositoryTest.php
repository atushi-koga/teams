<?php

namespace Tests\Unit\Infrustructure;

use App\Eloquent\EloquentUser;
use packages\Domain\Domain\Common\Date;
use packages\Domain\Domain\Common\Prefecture;
use packages\Domain\Domain\Recruitment\Capacity;
use packages\Domain\Domain\Recruitment\Recruitment;
use packages\Infrustructure\Recruitment\RecruitmentRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecruitmentRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function testCanCreate()
    {
        $repository = new RecruitmentRepository();
        $user       = factory(EloquentUser::class)->create();

        $recruitment = new Recruitment(
            '丹沢大山に登ろう',
            '丹沢大山',
            Prefecture::of(14),
            '伊勢原駅→登山開始→下山完了',
            Date::ofFormatDate('2019/10/3'),
            Capacity::of(intval(5)),
            Date::ofFormatDate('2019/10/10'),
            $user->id
        );

        $repository->create($recruitment);

        $this->assertDatabaseHas(
            'recruitment', [
                'id'         => 1,
                'title'      => '丹沢大山に登ろう',
                'mount'      => '丹沢大山',
                'prefecture' => 14,
                'schedule'   => '伊勢原駅→登山開始→下山完了',
                'date'       => '2019/10/3',
                'capacity'   => 5,
                'deadline'   => '2019/10/10',
                'create_id'  => $user->id,
            ]
        );

        $this->assertDatabaseHas(
            'users_recruitment', [
                'id'             => 1,
                'user_id'        => $user->id,
                'recruitment_id' => 1,
                'is_accepted'    => true,
                'user_status'    => 10,
            ]
        );
    }
}
