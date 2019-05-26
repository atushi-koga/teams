<?php

namespace App\Http\Controllers\MyPage;

use App\Http\Requests\JoinRequest;
use App\Http\Controllers\Controller;
use packages\UseCase\MyPage\Recruitment\JoinRecruitmentUseCaseInterface;

class DetailRecruitmentController extends Controller
{
    public function join(JoinRequest $request, JoinRecruitmentUseCaseInterface $interactor)
    {
        //        $joinRecruitmentRequest = new JoinRecruitmentRequest($request->recruitment_id, $request->user_id);
        //        // users_recruitmentに値を登録
        //        $interactor->handle($request->id);
        //
        return 200;
    }
}
