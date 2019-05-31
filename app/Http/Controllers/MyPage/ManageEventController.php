<?php

namespace App\Http\Controllers\MyPage;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewRecruitmentFormRequest;
use Auth;
use Illuminate\Http\Request;
use packages\Domain\Domain\Recruitment\CreatedRecruitment;
use packages\Domain\Domain\Recruitment\Recruitment;
use packages\Domain\Domain\Recruitment\RecruitmentId;
use packages\Domain\Domain\User\UserId;
use packages\UseCase\MyPage\Recruitment\CreatedEventUseCaseInterface;
use packages\UseCase\MyPage\Recruitment\DeleteRecruitmentRequest;
use packages\UseCase\MyPage\Recruitment\DeleteRecruitmentUseCaseInterface;
use packages\UseCase\MyPage\Recruitment\EditRecruitmentFormResponse;
use packages\UseCase\MyPage\Recruitment\EditRecruitmentFormUseCaseInterface;
use packages\UseCase\MyPage\Recruitment\EditRecruitmentRequest;
use packages\UseCase\MyPage\Recruitment\EditRecruitmentUseCaseInterface;
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

    public function editForm($id, EditRecruitmentFormUseCaseInterface $interactor)
    {
        $recruitmentId = RecruitmentId::of(intval($id));

        /** @var EditRecruitmentFormResponse $res */
        $res = $interactor->handle($recruitmentId);

        return view('manage.edit_event.form')->with([
            'recruitment' => $res->getRecruitment(),
            'prefectures' => $res->getPrefectures()
        ]);
    }

    public function edit($id, Request $request, EditRecruitmentUseCaseInterface $interactor)
    {
        $editUserId  = UserId::of(Auth::id());
        $recruitment = Recruitment::ofByArray($request->all());
        $recruitment->setId(intval($id));

        $req = new EditRecruitmentRequest($editUserId, $recruitment);
        $interactor->handle($req);

        return redirect(route('manage-event.editFinish', ['id' => $id]));
    }

    public function editFinish()
    {
        return view('manage.edit_event.finish');
    }

    public function remove(Request $request, DeleteRecruitmentUseCaseInterface $interactor)
    {
        $recruitmentId = RecruitmentId::of(intval($request->input('recruitment_id')));
        $deleteUserId  = UserId::of(Auth::id());
        $req           = new DeleteRecruitmentRequest($deleteUserId, $recruitmentId);

        $interactor->handle($req);

        return 200;
    }
}
