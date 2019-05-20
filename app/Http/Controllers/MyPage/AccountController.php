<?php

namespace App\Http\Controllers\MyPage;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use packages\Domain\Domain\User\AccountDetail;
use packages\UseCase\MyPage\Account\AccountDetailRequest;
use packages\UseCase\MyPage\Account\AccountDetailUseCaseInterface;

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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function shoEditForm()
    {
        return view('my_page.account.edit');
    }

    /**
     * ユーザ情報を編集し詳細画面にリダイレクト
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit()
    {
        session()->flash('status', 'アカウント情報を更新しました');

        return redirect(route('account.detail'));
    }

}
