<?php

namespace App\Http\Controllers\MyPage;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopController extends Controller
{
    public function showTop()
    {
        return view('my_page.top');
    }

    public function logout(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        return redirect(route('showLoginForm'));
    }
}
