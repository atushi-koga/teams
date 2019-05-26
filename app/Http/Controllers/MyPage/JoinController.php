<?php

namespace App\Http\Controllers\MyPage;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use packages\Domain\Domain\Recruitment\DetailRecruitment;
use packages\UseCase\MyPage\Recruitment\JoinConfUseCaseInterface;
use packages\UseCase\Top\DetailRecruitmentRequest;

class JoinController extends Controller
{
    /**
     * 参加申込の確認画面を表示
     *
     * @param int                      $id
     * @param JoinConfUseCaseInterface $interactor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showConf($id, JoinConfUseCaseInterface $interactor)
    {
        $browsingUserId = Auth::id();
        $request        = new DetailRecruitmentRequest($id, $browsingUserId);

        /** @var DetailRecruitment $res */
        $res = $interactor->handle($request);

        return view('my_page.attend_recruitment.conf', compact('res'));
    }

    /**
     * 参加申込処理
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function join($id)
    {
        dd('join request');
        // 登録処理

        // 完了後リダイレクト
        return redirect(route('attend-recruitment.finish'));
    }

    public function showFinish()
    {
        return view('my_page.attend_recruitment.finish');
    }
}
