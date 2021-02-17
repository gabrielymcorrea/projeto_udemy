<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Campo nome é obrigatório',
            'email.required' => 'Campo endereço é obrigatorio',
            'email.unique' => 'Endereço de email já cadastrado',
            'password.required' =>'senha obrigatória'
        ];
    }
}
