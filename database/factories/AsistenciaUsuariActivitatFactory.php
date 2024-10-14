<?php

namespace Database\Factories;

use App\Models\Usuari;
use App\Models\Activitat;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AsistenciaUsuariActivitatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $table = 'asistencia_usuari_activitats';

    public function definition(): array
    {
        do {
            $usuari = DB::table('usuaris')->inRandomOrder()->first();
            $activitat = DB::table('activitats')->inRandomOrder()->first();

            $exists = DB::table('asistencia_usuari_activitats')
                ->where('usuari_id', $usuari->id)
                ->where('activitat_id', $activitat->id)
                ->exists();           
        } while ($exists);

        return [
            'usuari_id' => $usuari->id,
            'activitat_id' => $activitat->id,
            'nom_usuari' => $usuari->nom,
            'nom_activitat' => $activitat->nom
        ];
    }
}
