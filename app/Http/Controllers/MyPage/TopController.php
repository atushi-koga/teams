<?php

namespace App\Http\Controllers\MyPage;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopController extends Controller
{
    /**
     * マイページからログアウトしログイン画面にリダイレクト
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

        return redirect(route('showLoginForm'));
    }
}
