<?php

namespace App\Modules\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => "required",
            'permissions' => 'array',
            'permissions.*' => 'string|regex:/^[A-Z_]+$/|exists:permissions,name',

        ];
    }
}
