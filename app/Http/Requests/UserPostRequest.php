<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPostRequest extends FormRequest
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

        if (\Arr::has($this->input(), 'email')) {
            $rules = [
                'name' => 'required',
                'lastname' => 'required',
                'street' => 'required',
                'strNumber' => 'required|integer',
                'email' => 'required|email',
            ];

        }

        $rules['password'] = 'required|confirmed';
        $rules['password_confirmation'] = 'required';

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
            'lastname' => 'Last name',
            'street' => 'Street',
            'strNumber' => 'Street Number',
            'email' => 'Email',
            'password' => 'Password',
            'password_confirmation' => 'Confirm password',

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
            'confirmed' => 'Passwords don\'t match.',
            'email' => 'The Email has to be a valid one.',
            'integer' => 'The Street Number has to be a number.',
            'unique' => 'The Email has already been taken.',
        ];
    }

}
