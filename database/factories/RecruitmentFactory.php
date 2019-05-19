<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Eloquent\EloquentRecruitment;
use Faker\Generator as Faker;

$factory->define(EloquentRecruitment::class, function (Faker $faker) {
    return [
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
    ];
});
