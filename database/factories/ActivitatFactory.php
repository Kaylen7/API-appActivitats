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
        return [
            'nom' => fake()->sentence(),
            'descripcio' => fake()->paragraph(2),
            'data_esdeveniment' => fake()->dateTime(),
            'creat_per' => Usuari::pluck('id')->random(),
            'capacitat_maxima' => rand(1,50)
        ];
    }
}
