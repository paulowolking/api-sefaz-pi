<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'sometimes|min:3',
            'email' => 'sometimes|email|unique:users,email,'. $this->user()->id,
            'password' => 'min:6',
            'current_password' => 'required_with:password|nullable|password:api',
            'photo' => 'mimes:jpeg,bmp,png',
        ];
    }
}
