<?php

namespace Tests\Unit\Domain\Application\Auth\Register;

use Hash;
use packages\Domain\Application\Auth\Register\RegisterUserInteractor;
use packages\Domain\Domain\Common\Prefecture;
use packages\Domain\Domain\User\BirthDay;
use packages\Domain\Domain\User\Email;
use packages\Domain\Domain\User\Gender;
use packages\Domain\Domain\User\Password;
use packages\Domain\Domain\User\User;
use packages\Infrustructure\User\UserRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterUserInteractorTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->setInitData();
    }

    /**
     * 会員情報が正常に登録される事を確認
     *
     * @return void
     */
    public function testCanCreateUser()
    {
        $repository = new UserRepository();
        $interactor = new RegisterUserInteractor($repository);

        $user = new User(
            'user test',
            Prefecture::of(1),
            Gender::of(2),
            BirthDay::assemble('2000', '01', '11'),
            Email::of('test@gmail.com'),
            Password::ofRowPassword('1234abcd')
        );

        $createdUser = $interactor->handle($user);

        $this->assertEquals('user test', $createdUser->getNickName());
        $this->assertEquals(1, $createdUser->getPrefectureKey());
        $this->assertEquals(2, $createdUser->getGenderKey());
        $this->assertEquals('2000/1/11', $createdUser->getFormatBirthDate());
        $this->assertEquals('test@gmail.com', $createdUser->getEmail());
        $this->assertTrue(Hash::check('1234abcd', $createdUser->getPassword()));
    }
}
