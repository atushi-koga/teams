<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use packages\Domain\Domain\Common\Prefecture;

class EditRecruitmentFormRequest extends FormRequest
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

    public function rules()
    {
        return [
            'title'       => ['required', 'max:35'],
            'mount'       => ['required', 'max:20'],
            'prefecture'  => ['required', Rule::in(array_keys(Prefecture::Enum()))],
            'schedule'    => ['required', 'max:5000'],
            'date'        => ['required', 'date_format:Y-n-j', 'after_or_equal:tomorrow'],
            'capacity'    => ['required', 'numeric', 'regex:/^[1-9][0-9]?$/'],
            'deadline'    => ['required', 'date_format:Y-n-j', 'before:date'],
            'requirement' => ['nullable', 'max:5000'],
            'belongings'  => ['nullable', 'max:5000'],
            'notes'       => ['nullable', 'max:5000'],
        ];
    }

    public function messages()
    {
        return [
            'prefecture.required'  => '選択してください',
            'date.date_format'     => '正しく選択してください',
            'date.after_or_equal'  => '明日以降の日付を選択してください',
            'capacity.numeric'     => '半角数値で入力してください',
            'capacity.regex'       => '半角数値で99人以内で入力してください',
            'deadline.before'      => '活動日より前の日付を選択してください',
            'deadline.date_format' => '正しく選択してください',
        ];
    }
}
