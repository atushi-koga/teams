<?php

namespace App\Http\Controllers\MyPage;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use packages\Domain\Domain\Recruitment\DetailRecruitment;
use packages\UseCase\MyPage\Recruitment\JoinConfUseCaseInterface;
use packages\UseCase\MyPage\Recruitment\JoinFinishUseCaseInterface;
use packages\UseCase\MyPage\Recruitment\JoinRecruitmentRequest;
use packages\UseCase\MyPage\Recruitment\JoinRecruitmentUseCaseInterface;
use packages\UseCase\Top\DetailRecruitmentRequest;

class JoinController extends Controller
{
    /**
     * 参加申込の確認画面を表示
     *
     * @param                          $id
     * @param JoinConfUseCaseInterface $interactor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showConf($id, JoinConfUseCaseInterface $interactor)
    {
        $browsingUserId = Auth::id();
        $request        = new DetailRecruitmentRequest(intval($id), $browsingUserId);

        /** @var DetailRecruitment $res */
        $res = $interactor->handle($request);

        return view('my_page.attend_recruitment.conf', compact('res'));
    }

    /**
     * 参加申込処理
     *
     * @param                                 $id
     * @param JoinRecruitmentUseCaseInterface $interactor
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function join($id, JoinRecruitmentUseCaseInterface $interactor)
    {
        $browsingUserId = Auth::id();
        $request        = new DetailRecruitmentRequest(intval($id), $browsingUserId);
        $interactor->handle($request);

        return redirect(route('attend-recruitment.finish', ['id' => $request->getRecruitmentId()]));
    }

    public function showFinish($id, JoinFinishUseCaseInterface $interactor)
    {
        $browsingUserId = Auth::id();
        $request        = new DetailRecruitmentRequest(intval($id), $browsingUserId);

        /** @var DetailRecruitment $res */
        $res = $interactor->handle($request);

        return view('my_page.attend_recruitment.finish', compact('res'));
    }
}
