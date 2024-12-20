<?php

namespace App\Modules\Profile\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => "email|required",
            'name' => 'required|min:5',
            'profile_picture' => 'file|image',
            'new_password' =>  'nullable|min:8|regex:/[A-Z]/|regex:/[\W]/|required_with:new_password_confirmation',
            'new_password_confirmation' => 'same:new_password'
        ];
    }
}
