<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use packages\Domain\Domain\Common\Prefecture;
use packages\Domain\Domain\User\Gender;

class NewRecruitmentFormRequest extends FormRequest
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
            'title'        => ['required', 'max:100'],
            'mount'        => ['required', 'max:100'],
            'prefecture'   => ['required', Rule::in(array_keys(Prefecture::Enum()))],
            'schedule'     => ['required', 'max:1000'],
            'date'         => ['required', ],
            'capacity'     => ['required', ],
            'deadline'     => ['required', ],
            'requirement'  => ['max:1000'],
            'gender_limit' => ['nullable', Rule::in(array_keys(Gender::Enum()))],
        ];
    }
}
