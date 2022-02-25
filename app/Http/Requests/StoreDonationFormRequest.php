<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDonationFormRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|mimes:jpeg,bmp,png|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El Titulo es requerido',
            'description.required' => 'La Descripcion es requerida',
            'image.required' => 'Una imagen es requerida',
            'image.image' => 'Se necesita una Imagen valida',
            'image.max' => 'El tamaño máximo de la imagen puede ser de hasta 5Mb',
        ];
    }
}
