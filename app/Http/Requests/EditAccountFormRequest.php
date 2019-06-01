<?php

namespace App\Http\Requests;

use App\Rules\PasswordRule;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use packages\Domain\Domain\Common\Prefecture;

class EditAccountFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nickname'   => ['required', 'max:20'],
            'prefecture' => ['required', Rule::in(array_keys(Prefecture::Enum()))],
            'email'      => [
                'required',
                'email',
                'max:100',
                Rule::unique('users')
                    ->ignore(Auth::id())
            ],
            'password'   => ['required_if:change_pass,1', new PasswordRule(), 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'nickname.required'    => '入力してください',
            'nickname.max'         => ':max 文字以内で入力してください',
            'prefecture.required'  => '選択してください',
            'prefecture.in'        => '正しく選択してください',
            'email.required'       => '入力してください',
            'email.email'          => 'メールアドレス形式で入力してください',
            'email.max'            => ':max 文字以内で入力してください',
            'email.unique'         => '既に登録済みです',
            'password.required_if' => '入力してください',
            'password.min'         => ':min 文字以上で入力してください',
            'password.confirmed'   => 'パスワード確認用と同じ値を入力してください',
        ];
    }

}
