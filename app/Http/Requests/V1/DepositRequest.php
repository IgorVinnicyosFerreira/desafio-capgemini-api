<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class DepositRequest extends FormRequest
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
            "value"       =>    "required|regex:/^\d+(\.\d{1,2})?$/",
            "password"    =>    "required"
        ];
    }

    public function attributes()
    {
        return [
            "value"       =>  "valor",
        ];
    }
}