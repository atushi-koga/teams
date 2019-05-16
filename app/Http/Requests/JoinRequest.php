<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class JoinRequest extends FormRequest
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
        //@todo バリデーション記述（ログインユーザと同一か、未参加ステータスか）
        return [
            'recruitment_id' => ['required', 'exists:recruitment,id'],
            'user_id'        => ['required', 'exists:users,id',],
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()
                            ->toArray();

        throw new HttpResponseException(
            response()->json($errors, 422)
        );
    }
}
