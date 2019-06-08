<?php

namespace App\Http\Controllers\Auth;

use App\Eloquent\EloquentUser;
use App\Http\Controllers\Controller;
use App\Rules\PasswordRule;
use DB;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
        $this->middleware('guest')
             ->except('finish');
    }

    /**
     * Display the password reset view for the given token.
     *
     * @param  string $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm($token)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token,]
        );
    }

    public function finish()
    {
        return view('auth.passwords.finish');
    }

    protected function sendResetResponse(Request $request, $response)
    {
        return redirect(route('password.finish'));
    }

    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => ['required', new PasswordRule(), 'confirmed'],
        ];
    }

    /**
     * Get the password reset validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages()
    {
        return [
            'token.required'     => '正常に処理できませんでした',
            'email.required'     => '入力してください',
            'email.email'        => 'メールアドレス形式で入力してください',
            'password.required'  => '入力してください',
            'password.confirmed' => 'パスワード確認用と同じ値を入力してください',
        ];
    }

}
