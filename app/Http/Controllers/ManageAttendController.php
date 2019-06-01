<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use packages\Domain\Domain\Recruitment\RecruitmentId;
use packages\Domain\Domain\User\OpenUserInfo;
use packages\Domain\Domain\User\UserId;
use packages\UseCase\MyPage\Recruitment\ManageAttendListCaseInterface;
use packages\UseCase\MyPage\Recruitment\ManageAttendListRequest;

class ManageAttendController extends Controller
{
    public function list($id, ManageAttendListCaseInterface $interactor)
    {
        $browsingUserId = UserId::of(Auth::id());
        $recruitmentId  = RecruitmentId::of(intval($id));
        $req            = new ManageAttendListRequest($browsingUserId, $recruitmentId);

        /** @var OpenUserInfo[] $res $res */
        $res = $interactor->handle($req);
        
        return view('manage.attend_list.list', compact('res'));
    }

    public function accept()
    {

    }

    public function notAccept()
    {

    }
}
