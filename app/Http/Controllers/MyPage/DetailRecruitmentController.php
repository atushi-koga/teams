<?php

namespace App\Http\Controllers\MyPage;

use App\Eloquent\EloquentRecruitment;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use packages\Domain\Domain\Recruitment\DetailRecruitment;
use packages\UseCase\MyPage\Recruitment\DetailRecruitmentRequest;
use packages\UseCase\MyPage\Recruitment\DetailRecruitmentUseCaseInterface;

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
}
