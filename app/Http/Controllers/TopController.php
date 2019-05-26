<?php

namespace App\Http\Controllers;

use App\Eloquent\EloquentUser;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use packages\Domain\Domain\Recruitment\DetailRecruitment;
use packages\UseCase\Top\DetailRecruitmentRequest;
use packages\UseCase\Top\DetailRecruitmentUseCaseInterface;
use packages\UseCase\Top\ShowTopResponse;
use packages\UseCase\Top\ShowTopUseCaseInterface;

class TopController extends Controller
{
    /**
     * マイページトップ画面を表示
     *
     * @param ShowTopUseCaseInterface $interactor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showTop(ShowTopUseCaseInterface $interactor)
    {
        /** @var ShowTopResponse $response */
        $res = $interactor->handle();

        return view('top.index', compact('res'));
    }

    /**
     * 募集情報の詳細画面を表示
     *
     * @param                                   $id
     * @param DetailRecruitmentUseCaseInterface $interactor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detailRecruitment($id, DetailRecruitmentUseCaseInterface $interactor)
    {
        $browsingUserId = Auth::id() ?? null;
        $request        = new DetailRecruitmentRequest($id, $browsingUserId);

        /** @var DetailRecruitment $res */
        $res = $interactor->handle($request);

        return view('detail_recruitment.index', compact('res'));
    }

}
