<?php

namespace App\Http\Controllers\MyPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use packages\Domain\Domain\Recruitment\CreatedRecruitment;
use packages\Domain\Domain\User\UserId;
use packages\UseCase\MyPage\Recruitment\CreatedEventUseCaseInterface;

class ManageEventController extends Controller
{
    public function list(CreatedEventUseCaseInterface $interactor)
    {
        /** @var CreatedRecruitment[] $res */
        $res = $interactor->handle(UserId::of(\Auth::id()));

        return view('manage.event_list.list', compact('res'));
    }

    public function createForm()
    {

    }

    public function create()
    {

    }

    public function createFinish()
    {

    }

    public function editForm()
    {

    }

    public function edit()
    {

    }

    public function editFinish()
    {

    }

    public function remove()
    {

    }
}
