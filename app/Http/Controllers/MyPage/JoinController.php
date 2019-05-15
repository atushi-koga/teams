<?php

namespace App\Http\Controllers\MyPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JoinController extends Controller
{
    public function showConf()
    {
        return view('my_page.attend_recruitment.conf');
    }

    public function join()
    {
        dd('join request');
        // 登録処理

        // 完了後リダイレクト
        return redirect(route('attend-recruitment.finish'));
    }

    public function showFinish()
    {
        return view('my_page.attend_recruitment.finish');
    }
}
