<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscrRequest extends FormRequest
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
            'email' => 'required|email|unique:subscriptions'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Введите E-mail',
            'email.email' => 'E-mail не соответсвует форме',
            'email.unique' => 'На данный E-mail уже оформлена подписка',
        ];
    }
}
