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
        $this->createRecruitment();
        $this->createUserRecruitment();
    }

    private function createRecruitment()
    {
        $query = EloquentRecruitment::query();
        $query->create([
            'title'       => '筑波山に登る会',
            'mount'       => '筑波山',
            'prefecture'  => Prefecture::of(8)
                                       ->getKey(),
            'schedule'    => '筑波駅集合 → 登山開始 → 頂上 → 下山完了、解散',
            'date'        => Date::ofFormatDate('2019/05/20')
                                 ->getFormatDate(),
            'capacity'    => Capacity::of(intval(20))
                                     ->getValue(),
            'deadline'    => Date::ofFormatDate('2019/05/13')
                                 ->getFormatDate(),
            'requirement' => 'ルールを守れる方',
            'belongings'  => '昼食、着替えなど',
            'notes'       => '時間厳守でお願いします',
            'create_id'   => 1,
            'created_at'  => Carbon::now(),
        ]);
        $query->create([
            'title'       => '風光明媚な棒の折れ山に登りましょー！',
            'mount'       => '棒の折れ山',
            'prefecture'  => Prefecture::of(13)
                                       ->getKey(),
            'schedule'    => '棒の折れ山駅集合 → 登山開始 → 頂上 → 下山完了、解散',
            'date'        => Date::ofFormatDate('2019/08/20')
                                 ->getFormatDate(),
            'capacity'    => Capacity::of(intval(20))
                                     ->getValue(),
            'deadline'    => Date::ofFormatDate('2019/08/13')
                                 ->getFormatDate(),
            'requirement' => 'ルールを守れる方',
            'belongings'  => '昼食、着替えなど',
            'create_id'   => 1,
            'created_at'  => Carbon::now(),
        ]);
        $query->create([
            'title'       => '大山に登りませんか',
            'mount'       => 'おおやま',
            'prefecture'  => Prefecture::of(13)
                                       ->getKey(),
            'schedule'    => '大山駅集合 → 登山開始 → 頂上 → 下山完了、解散',
            'date'        => Date::ofFormatDate('2019/09/01')
                                 ->getFormatDate(),
            'capacity'    => Capacity::of(intval(15))
                                     ->getValue(),
            'deadline'    => Date::ofFormatDate('2019/08/27')
                                 ->getFormatDate(),
            'requirement' => 'ルールを守れる方',
            'create_id'   => 2,
            'created_at'  => Carbon::now(),
        ]);
        $query->create([
            'title'       => '高尾山に登ろう！',
            'mount'       => '高尾山',
            'prefecture'  => Prefecture::of(13)
                                       ->getKey(),
            'schedule'    => '高尾駅集合 → 登山開始 → 頂上 → 下山完了、解散',
            'date'        => Date::ofFormatDate('2019/10/3')
                                 ->getFormatDate(),
            'capacity'    => Capacity::of(intval(10))
                                     ->getValue(),
            'deadline'    => Date::ofFormatDate('2019/10/10')
                                 ->getFormatDate(),
            'requirement' => 'ルールを守れる方',
            'create_id'   => 1,
            'created_at'  => Carbon::now(),
        ]);
    }

    private function createUserRecruitment()
    {
        EloquentUsersRecruitment::query()
                                ->insert([
                                    [
                                        'user_id'        => 1,
                                        'recruitment_id' => 1,
                                        'is_accepted'    => true,
                                        'user_status'    => UserStatus::ADMIN_STATUS,
                                        'created_at'     => Carbon::now(),
                                    ],
                                    [
                                        'user_id'        => 1,
                                        'recruitment_id' => 2,
                                        'is_accepted'    => true,
                                        'user_status'    => UserStatus::ADMIN_STATUS,
                                        'created_at'     => Carbon::now(),
                                    ],
                                    [
                                        'user_id'        => 2,
                                        'recruitment_id' => 2,
                                        'is_accepted'    => true,
                                        'user_status'    => UserStatus::PARTICIPANT_STATUS,
                                        'created_at'     => Carbon::now(),
                                    ],
                                    [
                                        'user_id'        => 3,
                                        'recruitment_id' => 2,
                                        'is_accepted'    => false,
                                        'user_status'    => UserStatus::PARTICIPANT_STATUS,
                                        'created_at'     => Carbon::now(),
                                    ],
                                    [
                                        'user_id'        => 1,
                                        'recruitment_id' => 3,
                                        'is_accepted'    => true,
                                        'user_status'    => UserStatus::PARTICIPANT_STATUS,
                                        'created_at'     => Carbon::now(),
                                    ],
                                    [
                                        'user_id'        => 2,
                                        'recruitment_id' => 3,
                                        'is_accepted'    => true,
                                        'user_status'    => UserStatus::ADMIN_STATUS,
                                        'created_at'     => Carbon::now(),
                                    ],
                                    [
                                        'user_id'        => 1,
                                        'recruitment_id' => 4,
                                        'is_accepted'    => false,
                                        'user_status'    => UserStatus::ADMIN_STATUS,
                                        'created_at'     => Carbon::now(),
                                    ],
                                ]);
    }
}


