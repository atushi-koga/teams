<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /**
     * ログイン画面を表示
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLogin()
    {
        $fbRedirectToURL = '';
        $twRedirectToURL = '';
        $goRedirectToURL = '';

        return view('admin.login');
    }

    /**
     * 認可サーバにリダイレクト
     *
     * @return mixed
     */
    public function redirectToProvider(Request $request)
    {


        return Socialite::driver('facebook')->redirect();
    }

    /**
     * ユーザによるSNS認証後、アクセストークンを使ってリソースサーバからユーザ情報を取得
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        dd($user);
    }
}
