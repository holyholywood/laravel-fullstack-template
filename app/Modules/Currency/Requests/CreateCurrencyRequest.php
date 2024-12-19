<?php

namespace App\Modules\Currency\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCurrencyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => "required|string|min:3",
            'abbr' => "required|string|min:1",
            'code' => "required|string|min:2",
            'region' => "required|string",
        ];
    }
}
