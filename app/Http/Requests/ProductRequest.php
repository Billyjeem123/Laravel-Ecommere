<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'pname' => 'bail|required|string|max:255',
            'pquantity' => 'required|integer',
            'prie' => 'required|numeric',
            'usertoken' => 'required|integer',
            'file[]' => 'required|image|mimes:jpg,png',
            'desc' => 'required|string',
            'catid' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'pname.required' => 'The product name is required.',
            'pname.string' => 'The product name must be a string.',
            'pname.max' => 'The product name may not be greater than :max characters.',
            'pquantity.required' => 'The product quantity is required.',
            'pquantity.integer' => 'The product quantity must be an integer.',
            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a numeric value.',
            'usertoken.required' => 'The user token is required.',
            'usertoken.integer' => 'The user token must be an integer.',
            'file.required' => 'An image file is required.',
            'file.image' => 'The file must be an image.',
            'file.mimes' => 'The file must be a JPG or PNG image.',
            'desc.required' => 'The description is required.',
            'desc.string' => 'The description must be a string.',
            'catid.required' => 'The category ID is required.',
            'catid.integer' => 'The category ID must be an integer.',
        ];
    }
}
