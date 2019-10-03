<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::user('id')),
            ],
            'avatar' => 'nullable|image',
            'position' => 'max:50'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Введите имя',
            'email.required' => 'Введите E-mail',
            'email.email' => 'E-mail не соответствует форме',
            'email.unique' => 'Данный E-mail уже занят',
            'avatar.image' => 'Неверный формат изображения',
            'position.max' => 'Мксимум 50 символов'
        ];
    }
}