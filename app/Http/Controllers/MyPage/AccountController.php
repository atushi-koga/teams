<?php

namespace App\Http\Controllers\MyPage;

use App\Http\Requests\EditAccountFormRequest;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use packages\Domain\Application\MyPage\AccountEditInteractor;
use packages\Domain\Domain\Common\Prefecture;
use packages\Domain\Domain\User\AccountDetail;
use packages\Domain\Domain\User\AccountEditForm;
use packages\Domain\Domain\User\Email;
use packages\Domain\Domain\User\Password;
use packages\UseCase\MyPage\Account\AccountDetailRequest;
use packages\UseCase\MyPage\Account\AccountDetailUseCaseInterface;
use packages\UseCase\MyPage\Account\AccountEditRequest;
use packages\UseCase\MyPage\Account\AccountEditUseCaseInterface;
use packages\UseCase\MyPage\Account\ShowAccountEditUseCaseInterface;
use packages\UseCase\MyPage\Account\ShowAccountEditRequest;

class AccountController extends Controller
{
    /**
     * ログインユーザの情報を表示
     *
     * @param AccountDetailUseCaseInterface $interactor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail(AccountDetailUseCaseInterface $interactor)
    {
        $request = new AccountDetailRequest(Auth::id());

        /** @var AccountDetail $res */
        $res = $interactor->handle($request);

        return view('my_page.account.detail', compact('res'));
    }

    /**
     * アカウント情報の編集フォームを表示
     *
     * @param ShowAccountEditUseCaseInterface $interactor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function shoEditForm(ShowAccountEditUseCaseInterface $interactor)
    {
        $request = new ShowAccountEditRequest(Auth::id());

        /** @var AccountEditForm $res */
        $res = $interactor->handle($request);

        return view('my_page.account.edit', compact('res'));
    }

    /**
     * ユーザ情報を編集し詳細画面にリダイレクト
     *
     * @param EditAccountFormRequest      $request
     * @param AccountEditUseCaseInterface $interactor
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit(EditAccountFormRequest $request, AccountEditUseCaseInterface $interactor)
    {
        $request = new AccountEditRequest(
            Auth::id(),
            $request->nickname,
            Prefecture::of(intval($request->prefecture)),
            Email::of($request->email),
            $request->password,
            $request->introduction
        );

        $interactor->handle($request);

        return redirect(route('account.showEditFinish'));
    }

    public function showEditFinish()
    {
        return view('my_page.account.edit_finish');
    }

    /**
     * ログアウト
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        Auth::guard()
            ->logout();

        $request->session()
                ->invalidate();

        return redirect(route('top'));
    }

}
