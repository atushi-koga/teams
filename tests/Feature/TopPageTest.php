<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TopPageTest extends TestCase
{
    /**
     * トップページが表示される事を確認
     *
     * @return void
     */
    public function testCanDisplayTop()
    {
        $response = $this->get('/');

        $response->assertStatus(200)
                 ->assertViewIs('top');
    }
}
