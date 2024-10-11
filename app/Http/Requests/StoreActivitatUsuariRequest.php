<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class StoreActivitatUsuariRequest extends FormRequest
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
        $id = $this->route('id');
        $id_usuaris = $this->input('id_usuaris');
        return [
            'id_usuaris' => [
            'required',
            'array',
            function($attribute, $value, $fail) use ($id) {
                $usuarisExistents = DB::table('asistencia_usuari_activitats')
                    ->where('activitat_id', $id)
                    ->whereIn('usuari_id', $value)
                    ->pluck('usuari_id');

                    if($usuarisExistents->isNotEmpty()){
                        $fail("Els usuaris $usuarisExistents ja estan inscrits.");
                    }
                }
            ],
            'id_usuaris.*' => [
                'exists:usuaris,id',
                function($attribute, $value, $fail) use ($id, $id_usuaris){
                    $activitat = DB::table('activitats')
                    ->where('id', $id)->first();

                    if(!$activitat){
                        $fail('No existeix aquesta activitat');
                        return;
                    }

                    $asistenciaActual = DB::table('asistencia_usuari_activitats')
                    ->where('activitat_id', $id)
                    ->count();

                    $asistenciaNova = count($id_usuaris);

                    if (($asistenciaActual + $asistenciaNova) > $activitat->capacitat_maxima){
                        $fail("El nombre d'asistents excedeix la capacitat màxima de l'activitat.");
                    }
                }
            ]
        ];
    }
}
