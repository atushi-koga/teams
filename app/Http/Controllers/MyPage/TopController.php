<?php

namespace App\Http\Controllers\MyPage;

use App\Eloquent\EloquentUser;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use packages\Domain\Domain\User\Age;
use packages\Domain\Domain\User\BrowsingRestriction;
use packages\Domain\Domain\User\Gender;
use packages\UseCase\MyPage\Top\ShowTopResponse;
use packages\UseCase\MyPage\Top\ShowTopUseCaseInterface;

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
        /** @var EloquentUser $loginUser */
        $loginUser = Auth::user();

        $browsingRestriction = BrowsingRestriction::of(
            Age::of($loginUser->birthday->age),
            Gender::of($loginUser->gender)
        );

        /** @var ShowTopResponse $response */
        $response = $interactor->handle($browsingRestriction);

        return view('my_page.top.index', compact('response'));
    }

    /**
     * マイページからログアウトしログイン画面にリダイレクト
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        return redirect(route('showLoginForm'));
    }
}
