<?php

namespace App\Http\Controllers\MyPage;

use Auth;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use packages\Domain\Domain\Recruitment\Deadline;
use packages\Domain\Domain\Recruitment\TopRecruitment;
use packages\Domain\Domain\Recruitment\UserRecruitment;
use packages\Domain\Domain\User\UserId;
use packages\UseCase\MyPage\Recruitment\AttendListCaseInterface;
use packages\UseCase\MyPage\Recruitment\CancelAttendUseCaseInterface;

class AttendController extends Controller
{
    public function list(AttendListCaseInterface $interactor)
    {
        /** @var TopRecruitment[] $res */
        $res = $interactor->handle(UserId::of(Auth::id()));

        return view('my_page.attend_list.list', compact('res'));
    }

    public function cancel(Request $request, CancelAttendUseCaseInterface $interactor)
    {
        $userRecruitment = UserRecruitment::ofByArray([
            'user_id'        => UserId::of(Auth::id()),
            'recruitment_id' => intval($request->input('recruitment_id')),
        ]);

        $interactor->handle($userRecruitment);

        return 200;
    }
}
