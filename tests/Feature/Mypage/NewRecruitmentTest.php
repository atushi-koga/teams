<?php

namespace Tests\Feature\Mypage;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewRecruitmentTest extends TestCase
{
        use RefreshDatabase;

    /**
     * 募集内容登録画面が表示される事を確認
     *
     * @return void
     */
    public function testCanDisplayCreateForm()
    {
        $this->login();

        $response = $this->get('/my-page/new-recruitment');

        $response->assertStatus(200)
                 ->assertViewIs('my_page.new_recruitment.form');
    }

    /**
     * 募集内容情報が正常にDB登録される事を確認
     */
    public function testCanCreateRecruitment()
    {
        $this->setInitData();
        $user = $this->login();

        $this->post(
            '/my-page/new-recruitment', [
                'title'      => '高尾山に登ろう',
                'mount'      => '高尾山',
                'prefecture' => 13,
                'schedule'   => '高尾山口駅集合→登山開始→下山→解散',
                'date'       => '2019/5/5',
                'capacity'   => 20,
                'deadline'   => '2019/5/12',
                'create_id'  => $user->id,
            ]
        );

        $this->assertDatabaseHas(
            'recruitment', [
                'title' => '高尾山に登ろう',
                'mount' => '高尾山',
            ]
        );

        $this->assertDatabaseHas(
            'users_recruitment', [
                'user_id'        => $user->id,
                'recruitment_id' => 1,
                'is_accepted'    => true,
                'user_status'    => 10,
            ]
        );
    }
}
