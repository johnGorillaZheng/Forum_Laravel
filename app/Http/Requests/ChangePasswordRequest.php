<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'old_password' => 'required|min:6',
            'new_password' => 'required|min:6|confirmed'

        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => '原始密码不能为空',
            'old_password.min' => '原始密码不能少于6位',
            'new_password.required' => '新密码不能为空',
            'new_password.min' => '新密码不能少于6位',
            'new_password.confirmed' => '两次输入密码不符'
        ];
    }
}
