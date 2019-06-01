<?php

namespace App\Http\Controllers\Auth;

use App\Eloquent\EloquentUser;
use App\Http\Requests\Auth\RegisterUserFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use packages\Domain\Domain\Common\Prefecture;
use packages\Domain\Domain\User\BirthDay;
use packages\Domain\Domain\User\Email;
use packages\Domain\Domain\User\Gender;
use packages\Domain\Domain\User\Password;
use packages\Domain\Domain\User\User;
use packages\UseCase\Auth\Register\RegisterUserFormResponse;
use packages\UseCase\Auth\Register\RegisterUserFormUseCaseInterface;
use packages\UseCase\Auth\Register\RegisterUserUseCaseInterface;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')
             ->except('showComplete');
    }

    /**
     * 新規会員登録画面を表示
     *
     * @param RegisterUserFormUseCaseInterface $interactor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm(RegisterUserFormUseCaseInterface $interactor)
    {
        /** @var RegisterUserFormResponse $res */
        $res = $interactor->handle();

        return view('auth.register.form', compact('res'));
    }

    /**
     * 新規会員を登録し完了画面を表示
     *
     * @param RegisterUserFormRequest      $request
     * @param RegisterUserUseCaseInterface $interactor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register(RegisterUserFormRequest $request, RegisterUserUseCaseInterface $interactor)
    {
        $birthday = "{$request->birth_year}-{$request->birth_month}-{$request->birth_day}";
        $user     = User::ofByArray($request->all() + ['birthday' => $birthday,]);
        $user->setPassword(Password::ofRowPassword($request->password));

        /** @var User $created_user */
        $created_user = $interactor->handle($user);

        $loginUser = new EloquentUser([
            'id'         => $created_user->getId(),
            'nickname'   => $created_user->getNickName(),
            'gender'     => $created_user->getGenderKey(),
            'prefecture' => $created_user->getPrefectureKey(),
            'birthday'   => $created_user->getBirthDate(),
            'email'      => $created_user->getEmail(),
            'password'   => $created_user->getPassword(),
        ]);

        $this->guard()
             ->login($loginUser);

        return redirect(route('register.showComplete'));
    }

    /**
     * 登録完了画面を表示
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showComplete()
    {
        return view('auth.register.complete');
    }
}
