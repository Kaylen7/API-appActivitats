<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuari>
 */
class UsuariFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->name(),
            'cognom1' => fake()->lastName(),
            'cognom2' => fake()->lastName(),
            'aniversari' => fake()->date(),
            'email' => fake()->unique()->safeEmail
        ];
    }
}
