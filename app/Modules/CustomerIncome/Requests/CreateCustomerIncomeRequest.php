<?php

namespace App\Modules\CustomerIncome\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerIncomeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => "required",
            'start_amount' => "required|numeric",
            'end_amount' => "required|numeric",
        ];
    }
}
