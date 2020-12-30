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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'numeric|min:0',
            'stock' => 'numeric|min:0',

        ];

        return $rules;
    }

    /**
     * Validation messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'numeric' => 'It has to be a number!',
            'mimes' => 'Wrong format!',
            'image' => 'Image is wrong!',
        ];
    }

}
