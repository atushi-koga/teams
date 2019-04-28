<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyPageController extends Controller
{
    public function showTop()
    {


        return view('admin.my_page.top');
    }
}
