<?php

namespace Tests\Feature;

use App\Eloquent\EloquentRecruitment;
use App\Eloquent\EloquentUser;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatedEventListTest extends TestCase
{
    use RefreshDatabase;

    /** @var EloquentUser $user */
    private $user;

    private $manageEventUrl;

    public function setUp(): void
    {
        parent::setUp();

        $this->manageEventUrl = '/manage/event';

        $this->setInitData();
        $this->user = $this->login();
    }

    public function testCanDisplayCreatedSomeEvents()
    {
        factory(EloquentRecruitment::class)->create([
            'create_id' => $this->user->id,
        ]);
        factory(EloquentRecruitment::class)->create([
            'create_id' => $this->user->id,
        ]);

        $this->get($this->manageEventUrl)
             ->assertStatus(200)
             ->assertViewIs('manage.event_list.list');
    }

    public function testCanDisplayNoEvent()
    {
        $this->get($this->manageEventUrl)
             ->assertStatus(200)
             ->assertViewIs('manage.event_list.list');
    }

}
