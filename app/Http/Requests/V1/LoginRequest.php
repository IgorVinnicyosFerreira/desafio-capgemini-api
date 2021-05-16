<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            "agencies_number"       =>  "required|exists:agencies,number",
            "number"                =>  "required|exists:current_accounts,number",
            "verification_digit"    =>  "required",
            "password"              =>  "required",
            "device"                =>  "nullable"
        ];
    }


    public function attributes()
    {
        return [
            "agencies_number"       =>  "agência",
            "number"                =>  "conta",
            "verification_digit"    =>  "dígito verificador"
        ];
    }
}
