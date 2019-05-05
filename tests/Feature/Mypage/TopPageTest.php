<?php

namespace Tests\Feature\Mypage;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TopPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * マイページトップ画面が表示される事を確認
     *
     * @return void
     */
    public function testCanDisplayTop()
    {
        $this->setInitData();
        $this->login();

        $response = $this->get('/my-page');

        $response->assertStatus(200)
                 ->assertViewIs('my_page.top.index');
    }
}
