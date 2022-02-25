<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequestFormRequest extends FormRequest
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
            'reason' => 'required|string',
        ];
    }
    
    public function messages()
    {
        return [
            'reason.required' => 'La Razon es requerida',
            'password.string' => 'Ingrese una razón con caracteres válidos',
        ];
    }
}
