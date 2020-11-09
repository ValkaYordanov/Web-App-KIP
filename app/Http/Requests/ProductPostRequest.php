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
            'file' => 'required|file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',

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
            'file' => 'File',

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

            'file' => 'file is wrong',
        ];
    }

}
