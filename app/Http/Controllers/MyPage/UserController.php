<?php

namespace App\Http\Controllers\MyPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use packages\Domain\Domain\User\OpenUserInfo;
use packages\UseCase\MyPage\User\UserProfileRequest;
use packages\UseCase\MyPage\User\UserProfileUseCaseInterface;

class UserController extends Controller
{
    public function profile($id, UserProfileUseCaseInterface $interactor)
    {
        // ユーザ情報を取得
        /** @var OpenUserInfo $res */
        $res = $interactor->handle(new UserProfileRequest($id));

        return view('my_page.user.profile', compact('res'));
    }
}
