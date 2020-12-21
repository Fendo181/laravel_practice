<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// フォームリクエスト
class SmapleRequest extends FormRequest
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
     * エラー時のメッセージを決めれる
     *
     * @return array
     */
    public function messages()
    {
        return [
            'firstName.required' => '名字は必ず入れてください。',
            'lastName.required' => '下の名前を必ず入れてください。',
            'memo.required' => 'memoを入れてください',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstName' => ['required','max:10'],
            'lastName' => ['required','max:10'],
            'memo' => 'required'
        ];
    }
}
