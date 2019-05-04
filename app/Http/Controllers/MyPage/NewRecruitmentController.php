<?php

namespace App\Http\Controllers\MyPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use packages\UseCase\MyPage\Recruitment\NewRecruitmentFormResponse;
use packages\UseCase\MyPage\Recruitment\NewRecruitmentFormUseCaseInterface;

class NewRecruitmentController extends Controller
{
    /**
     * 募集内容登録画面を表示
     *
     * @param NewRecruitmentFormUseCaseInterface $interactor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showForm(NewRecruitmentFormUseCaseInterface $interactor)
    {
        /** @var NewRecruitmentFormResponse $response */
        $response = $interactor->handle();

        return view('my_page.new_recruitment.form', compact('response'));
    }

    public function create()
    {

    }
}
