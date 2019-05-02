<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegisterUserFormRequest;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use packages\UseCase\Auth\Register\RegisterUserFormUseCaseInterface;
use packages\UseCase\Auth\Register\RegisterUserUseCaseInterface;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * 新規会員登録画面を表示
     *
     * @param RegisterUserFormUseCaseInterface $interactor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm(RegisterUserFormUseCaseInterface $interactor)
    {
        $response = $interactor->handle();

        return view('auth.register.form', compact('response'));
    }

    /**
     * 新規会員を登録
     *
     * @param RegisterUserFormRequest      $request
     * @param RegisterUserUseCaseInterface $interactor
     */
    public function register(RegisterUserFormRequest $request, RegisterUserUseCaseInterface $interactor)
    {
        $interactor->handle();

//        $this->guard()->login($user);
//
//        return $this->registered($request, $user)
//            ?: redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
