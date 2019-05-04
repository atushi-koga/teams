<?php

namespace Tests\Unit\Domain\Application\Auth\Register;

use packages\Domain\Application\Auth\Register\RegisterUserFormInteractor;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterUserFormInteractorTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->setInitData();
    }

    /**
     * 会員登録フォームに必要なデータが取得できる事を確認
     *
     * @return void
     */
    public function testCanResponse()
    {
        $interactor = new RegisterUserFormInteractor();
        $response = $interactor->handle();

        $this->assertEquals(47, count($response->prefectures));
        $this->assertEquals(2, count($response->genders));

        $this->assertEquals('北海道', $response->prefectures[1]);
        $this->assertEquals('男性', $response->genders[1]);
    }
}
