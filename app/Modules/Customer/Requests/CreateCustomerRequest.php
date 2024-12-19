<?php

namespace App\Modules\Customer\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => "required|min:4",
            'middle_name' =>  '',
            'last_name' =>  '',
            'email' =>  'email|required|email',
            'phone_number' =>  'numeric|required|numeric|min:8',
            'address' =>  '',
            'id_card_number' =>  'required',
            'id_card_img' => 'file|image',
            'income_id' => 'numeric'
        ];
    }
}
