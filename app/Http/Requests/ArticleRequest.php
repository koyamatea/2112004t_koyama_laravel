<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false; 削除
        return true; // 追加
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'edit_title' => 'required|max:15', // 追加
            'edit_story' => 'required|max:100', // 追加
            'filez' => 'max:2'
        ];
    }
    public function messages()
    {
        return [
            'filez.max' => '画像は２枚までです',
            'edit_title.required' => 'タイトルを入力してください。',
            'edit_title.max' => 'タイトルは15文字以内で入力してください。',
            'edit_story.required'  => '本文を入力してください。',
            'edit_story.max'  => '本文は100文字以内で入力してください。',
        ];
    }
}
