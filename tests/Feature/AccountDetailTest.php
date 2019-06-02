<?php

namespace Tests\Feature;

use App\Eloquent\EloquentUser;
use packages\Domain\Application\MyPage\AccountDetailInteractor;
use packages\Domain\Domain\Common\Prefecture;
use packages\Domain\Domain\User\Age;
use packages\Domain\Domain\User\BirthDay;
use packages\Domain\Domain\User\Gender;
use packages\Infrustructure\User\UserRepository;
use packages\UseCase\MyPage\Account\AccountDetailRequest;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccountDetailTest extends TestCase
{
    use RefreshDatabase;

    /** @var EloquentUser $user */
    private $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->setInitData();
        $this->user = $this->login();
    }

    public function testCanDisplayAccountDetailView()
    {
        $this->get('/account')
             ->assertStatus(200);
    }

    public function testCanDisplayUserInfo()
    {
        $repo          = new UserRepository();
        $interactor    = new AccountDetailInteractor($repo);
        $req           = new AccountDetailRequest($this->user->id);
        $accountDetail = $interactor->handle($req);

        $nickname   = $this->user->nickname;
        $prefecture = Prefecture::of($this->user->prefecture)
                                ->getValue();
        $gender     = Gender::of($this->user->gender)
                            ->getValue();
        $age        = BirthDay::of($this->user->birthday)
                              ->calculateAge()
                              ->getValue();
        $email      = $this->user->email;
        $this->assertEquals($nickname, $accountDetail->getNickname());
        $this->assertEquals($prefecture, $accountDetail->getPrefectureValue());
        $this->assertEquals($gender, $accountDetail->getGenderValue());
        $this->assertEquals($age, $accountDetail->getUserAge());
        $this->assertEquals($email, $accountDetail->getEmail());
    }
}
