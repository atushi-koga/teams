<?php

namespace App\Http\Controllers\MyPage;

use App\Eloquent\EloquentRecruitment;
use App\Http\Requests\JoinRequest;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use packages\Domain\Domain\Recruitment\DetailRecruitment;
use packages\UseCase\MyPage\Recruitment\DetailRecruitmentRequest;
use packages\UseCase\MyPage\Recruitment\DetailRecruitmentUseCaseInterface;
use packages\UseCase\MyPage\Recruitment\JoinRecruitmentRequest;
use packages\UseCase\MyPage\Recruitment\JoinRecruitmentUseCaseInterface;

class DetailRecruitmentController extends Controller
{
    /**
     * 募集情報の詳細画面を表示
     *
     * @param                                   $id
     * @param DetailRecruitmentUseCaseInterface $interactor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($id, DetailRecruitmentUseCaseInterface $interactor)
    {
        $request = new DetailRecruitmentRequest($id, Auth::id());

        /** @var DetailRecruitment $response */
        $response = $interactor->handle($request);

        return view('my_page.detail_recruitment.index', compact('response'));
    }

    public function join(JoinRequest $request, JoinRecruitmentUseCaseInterface $interactor)
    {
//        $joinRecruitmentRequest = new JoinRecruitmentRequest($request->recruitment_id, $request->user_id);
//        // users_recruitmentに値を登録
//        $interactor->handle($request->id);
//
        return 200;
    }
}
