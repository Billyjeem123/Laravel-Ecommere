<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRegisteration extends FormRequest
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
            'username' => 'required|string|max:255|unique:tblusers,name',
            'password' => 'required|string|min:8'
        ];
    }

    public function messages()
    {
        return [
            'username.unique' => 'The provided username is already taken. Please choose a different username.',
            // Add custom messages for other validation rules as needed
        ];
    }
}
