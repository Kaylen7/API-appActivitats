<?php

namespace Database\Factories;

use App\Models\Usuari;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activitat>
 */
class ActivitatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $noms = [
            'Calçotada',
            'Xocolatada',
            'Patinar',
            'Cinema',
            'Exposició',
            'Documental',
            'Lectura conjunta',
            'Hackaton',
            'Dormir'
        ];
        return [
            'nom' => $noms[array_rand($noms)],
            'descripcio' => rand(0,1) === 0 ? NULL : fake()->paragraph(2),
            'data_esdeveniment' => fake()->dateTime(),
            'creat_per' => Usuari::pluck('id')->random(),
            'capacitat_maxima' => rand(1,50)
        ];
    }
}
