<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActivitatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'string|max:255',
            'descripcio' => 'string|max:65535',
            'data_creacio' => 'date|after:now',
            'data_esdeveniment' => 'date|after:now',
            'creat_per' => 'exists:usuaris,id',
            'capacitat_maxima' => 'integer'
        ];
    }
}
