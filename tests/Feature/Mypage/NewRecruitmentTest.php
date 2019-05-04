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
}
