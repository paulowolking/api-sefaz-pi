<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioRequest extends FormRequest
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
        $rules = [
            'nome' => 'required',
            'email' => 'required|email|unique:users',
            'funcao' => 'sometimes|nullable|exists:roles,id',
            'senha' => 'required|min:6'
        ];

        if ($this->route('usuario')) { //Update
            $rules['email'] = [
                'required', Rule::unique('users')->ignore($this->route('usuario'))
            ];
            $rules['senha'] = 'sometimes|nullable|min:6';
        }

        return $rules;
    }
}
