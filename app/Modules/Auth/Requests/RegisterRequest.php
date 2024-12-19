<?php

namespace App\Modules\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => "email|required",
            'fullname' => 'required|min:5',
            'password' =>  'required|min:8|regex:/[A-Z]/|regex:/[\W]/|required_with:password_confirmation',
            'password_confirmation' => 'same:password'
        ];
    }

    public function messages()
    {
        return [
            'password.regex' => 'The password must include at least one uppercase letter and one symbol.',
            'password_confirmation.same' => 'The password confirmation does not match.',
        ];
    }
}
