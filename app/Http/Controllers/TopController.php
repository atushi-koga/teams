<?php

namespace App\Http\Controllers;

use App\Eloquent\EloquentUser;
use Auth;
use Illuminate\Http\Request;
use packages\UseCase\Top\ShowTopResponse;
use packages\UseCase\Top\ShowTopUseCaseInterface;

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
        /** @var ShowTopResponse $response */
        $res = $interactor->handle();

        return view('top.index', compact('res'));
    }
}
