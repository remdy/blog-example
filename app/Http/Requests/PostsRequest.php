<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
            'date' => 'required',
            'image' => 'nullable|image'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Введите название статьи',
            'content.required' => 'Введите полный текст (Описание статьи)',
            'date.required' => 'Выберите дату',
            'image.image' => 'Неверный формат изображения'
        ];
    }
}
