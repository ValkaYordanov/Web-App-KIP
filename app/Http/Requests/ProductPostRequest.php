<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductPostRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',

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
            'image' => 'Image',
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
            'mimes' => 'mimes wrong',

            'image' => 'Image is wrong!',
        ];
    }

}
