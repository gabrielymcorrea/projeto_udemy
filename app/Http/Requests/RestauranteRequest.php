<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestauranteRequest extends FormRequest
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
            'name' => 'required|min:5',
            'description' => 'required|min:5',
            'address' => 'required|min:5'
        ];
    }


    public function messages(){
        return [
            'name.required' => 'Campo nome é obrigatorio',
            'address.required' => 'Campo address é obrigatorio',
            'description.required' => 'Campo description é obrigatorio',
            '*.min' => 'Quantidade minima de caracteries é 5'
        ];
    }
}
