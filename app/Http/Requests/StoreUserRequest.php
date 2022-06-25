<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email'=> 'required|unique:users|email',
            'password'=> 'required|min:3|confirmed',
            'password_confirmation'=> 'required',
        ];
    }
}
