<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductPostRequest extends FormRequest
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
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'numeric|min:0|required',
            'stock' => 'numeric|min:0|required',
            'category' => 'required',

        ];

        return $rules;
    }

    /**
     * Validation attributes
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Name',
            'category' => 'Category',
            'price' => 'Price',
            'stock' => 'Stock',
        ];
    }

    /**
     * Validation messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'The :attribute field is required!',
            'numeric' => 'The :attribute field it has to be a number!',
            'mimes' => 'Wrong format!',
            'image' => 'Image is wrong!',
        ];
    }

}
