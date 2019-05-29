<?php

namespace App\Http\Controllers\MyPage;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewRecruitmentFormRequest;
use Auth;
use Illuminate\Http\Request;
use packages\Domain\Domain\Recruitment\CreatedRecruitment;
use packages\Domain\Domain\Recruitment\Recruitment;
use packages\Domain\Domain\User\UserId;
use packages\UseCase\MyPage\Recruitment\CreatedEventUseCaseInterface;
use packages\UseCase\MyPage\Recruitment\NewRecruitmentFormResponse;
use packages\UseCase\MyPage\Recruitment\NewRecruitmentFormUseCaseInterface;
use packages\UseCase\MyPage\Recruitment\NewRecruitmentUseCaseInterface;

class ManageEventController extends Controller
{
    /**
     * 作成したイベント一覧を表示
     *
     * @param CreatedEventUseCaseInterface $interactor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list(CreatedEventUseCaseInterface $interactor)
    {
        /** @var CreatedRecruitment[] $res */
        $res = $interactor->handle(UserId::of(\Auth::id()));

        return view('manage.event_list.list', compact('res'));
    }

    /**
     * 新規イベント登録画面を表示
     *
     * @param NewRecruitmentFormUseCaseInterface $interactor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createForm(NewRecruitmentFormUseCaseInterface $interactor)
    {
        /** @var NewRecruitmentFormResponse $response */
        $res = $interactor->handle();

        return view('manage.new_event.form', compact('res'));
    }

    /**
     * 新規イベントの登録処理
     *
     * @param NewRecruitmentFormRequest      $request
     * @param NewRecruitmentUseCaseInterface $interactor
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(NewRecruitmentFormRequest $request, NewRecruitmentUseCaseInterface $interactor)
    {
        $recruitment = Recruitment::ofByArray($request->all() + ['create_id' => Auth::id()]);

        $interactor->handle($recruitment);

        return redirect(route('manage-event.createFinish'));
    }

    /**
     * 新規イベント登録完了画面を表示
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createFinish()
    {
        return view('manage.new_event.finish');
    }

    public function editForm()
    {
        //        return view('');
    }

    public function edit()
    {

    }

    public function editFinish()
    {

    }

    public function remove()
    {

    }
}
