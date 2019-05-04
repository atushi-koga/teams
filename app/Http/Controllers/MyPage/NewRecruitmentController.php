<?php

namespace App\Http\Controllers\MyPage;

use App\Http\Requests\NewRecruitmentFormRequest;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use packages\Domain\Domain\Common\Date;
use packages\Domain\Domain\Common\Prefecture;
use packages\Domain\Domain\Recruitment\Capacity;
use packages\Domain\Domain\Recruitment\Recruitment;
use packages\UseCase\MyPage\Recruitment\NewRecruitmentFormResponse;
use packages\UseCase\MyPage\Recruitment\NewRecruitmentFormUseCaseInterface;
use packages\UseCase\MyPage\Recruitment\NewRecruitmentUseCaseInterface;

class NewRecruitmentController extends Controller
{
    /**
     * 募集内容登録画面を表示
     *
     * @param NewRecruitmentFormUseCaseInterface $interactor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showForm(NewRecruitmentFormUseCaseInterface $interactor)
    {
        /** @var NewRecruitmentFormResponse $response */
        $response = $interactor->handle();

        return view('my_page.new_recruitment.form', compact('response'));
    }

    public function create(NewRecruitmentFormRequest $request, NewRecruitmentUseCaseInterface $interactor)
    {
        $userId = Auth::id();

        $recruitment = new Recruitment(
            $request->title,
            $request->mount,
            Prefecture::of($request->prefecture),
            $request->schedule,
            Date::ofFormatDate($request->date),
            Capacity::of(intval($request->capacity)),
            Date::ofFormatDate($request->deadline),
            $userId
        );

        $interactor->handle($recruitment);

        dd('Create');

        // フラッシュメッセージを入れる

        // 詳細画面に戻る
    }
}
