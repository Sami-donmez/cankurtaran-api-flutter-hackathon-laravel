<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>"required",
            'date_of_birth'=>"required",
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Please enter an Ad title',
            'title.min' => 'Your title must be at least 4 character'
        ];
    }
}
