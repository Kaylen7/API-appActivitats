<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteActivitatUsuariRequest extends FormRequest
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
            'id_usuaris' => 'required|array',
            'id_usuaris.*' => 'exists:asistencia_usuari_activitats,usuari_id'
        ];
    }

    public function message(): array{
        
        return [
            'id_usuaris.exists' => "L'usuari no consta a la llista d'asistència"
        ];
    }
}
