<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'avatar' => 'nullable|image'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Введите имя',
            'email.required' => 'Введите e-mail',
            'email.email' => 'E-mail не соответствует форме',
            'password.required' => 'Введите пароль',
            'password.min' => 'Минимальная длина пароля 5 символов',
            'avatar.image' => 'Недопустимый формат изображения',
            'email.unique' => 'Данный email уже занят'
        ];
    }
}
