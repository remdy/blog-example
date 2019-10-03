<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsersUpdateRequest extends FormRequest
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
        $id = $this->route('user');
        return [
            'name' => 'required',
            'email' => [
                'email',
                Rule::unique('users')->ignore($id),
            ],
            'avatar' => 'nullable|image'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Введите имя',
            'email.required' => 'Введите e-mail',
            'email.email' => 'E-mail не соответствует форме',
            'avatar.image' => 'Недопустимый формат изображения'
        ];
    }
}
