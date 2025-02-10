<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:100', // 必須、文字列、最大100文字
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed', // password_confirmation と一致するか
                'regex:/[A-Za-z]/', // 英字が含まれる
                'regex:/[0-9]/', // 数字が含まれる
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'お名前を入力してください',
            'name.max' => '100文字以内で入力してください',
            'password.min' => 'パスワードは8文字以上で入力してください',
            'password.confirmed' => 'パスワードと一致しません',
        ];
    }
}
