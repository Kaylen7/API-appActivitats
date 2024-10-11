<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivitatRequest extends FormRequest
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
            'nom' => 'required|string|max:255',
            'descripcio' => 'string|max:65535',
            'data_creacio' => 'date|after:now',
            'data_esdeveniment' => 'required|date_format:Y-m-d H:i|after:now',
            'creat_per' => 'nullable|exists:usuaris,id',
            'capacitat_maxima' => 'nullable|integer'
        ];
    }
}
