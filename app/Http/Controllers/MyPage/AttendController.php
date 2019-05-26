<?php

namespace App\Http\Controllers\MyPage;

use Auth;
use App\Http\Controllers\Controller;
use packages\Domain\Domain\Recruitment\Deadline;
use packages\Domain\Domain\Recruitment\TopRecruitment;
use packages\Domain\Domain\User\UserId;
use packages\UseCase\MyPage\Recruitment\AttendListCaseInterface;

class AttendController extends Controller
{
    public function list(AttendListCaseInterface $interactor)
    {
        /** @var TopRecruitment[] $res */
        $res = $interactor->handle(UserId::of(Auth::id()));

        return view('my_page.attend_list.list', compact('res'));
    }
}
