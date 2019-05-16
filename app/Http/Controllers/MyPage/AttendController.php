<?php

namespace App\Http\Controllers\MyPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttendController extends Controller
{
    public function list()
    {
        return view('my_page.attend_list.list');
    }
}
