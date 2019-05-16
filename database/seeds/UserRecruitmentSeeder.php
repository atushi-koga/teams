<?php

use App\Eloquent\EloquentRecruitment;
use App\Eloquent\EloquentUsersRecruitment;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use packages\Domain\Domain\Common\Date;
use packages\Domain\Domain\Common\Prefecture;
use packages\Domain\Domain\Recruitment\Capacity;
use packages\Domain\Domain\User\UserStatus;

class UserRecruitmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     * @throws Throwable
     */
    public function run()
    {
        DB::transaction(function(){
            $this->createRecruitment();
            $this->createUserRecruitment();
        });
    }

    private function createRecruitment()
    {
        EloquentRecruitment::query()->insert([
            [
                'title'      => '高尾山に登ろう！',
                'mount'      => '高尾山',
                'prefecture' => Prefecture::of(13)->getKey(),
                'schedule'   => '高尾駅集合 → 登山開始 → 頂上 → 下山完了、解散',
                'date'       => Date::ofFormatDate('2019/10/3')->getFormatDate(),
                'capacity'   => Capacity::of(intval(20))->getValue(),
                'deadline'   => Date::ofFormatDate('2019/10/10')->getFormatDate(),
                'create_id'  => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'title'      => '高尾山に登ろう！',
                'mount'      => '高尾山',
                'prefecture' => Prefecture::of(13)->getKey(),
                'schedule'   => '高尾駅集合 → 登山開始 → 頂上 → 下山完了、解散',
                'date'       => Date::ofFormatDate('2019/10/3')->getFormatDate(),
                'capacity'   => Capacity::of(intval(20))->getValue(),
                'deadline'   => Date::ofFormatDate('2019/10/10')->getFormatDate(),
                'create_id'  => 1,
                'created_at' => Carbon::now(),
            ]
        ]);
    }

    private function createUserRecruitment()
    {
        EloquentUsersRecruitment::query()->insert([
            [
                'user_id'        => 1,
                'recruitment_id' => 1,
                'is_accepted'    => true,
                'user_status'    => UserStatus::ADMIN_STATUS,
                'created_at'     => Carbon::now(),
            ],
            [
                'user_id'        => 2,
                'recruitment_id' => 1,
                'is_accepted'    => false,
                'user_status'    => UserStatus::PARTICIPANT_STATUS,
                'created_at'     => Carbon::now(),
            ],
            [
                'user_id'        => 1,
                'recruitment_id' => 2,
                'is_accepted'    => true,
                'user_status'    => UserStatus::ADMIN_STATUS,
                'created_at'     => Carbon::now(),
            ],
        ]);
    }
}


