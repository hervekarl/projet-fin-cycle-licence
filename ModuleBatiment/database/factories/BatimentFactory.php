<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Batiment>
 */
class BatimentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom_batiment' => fake()->unique()->word, // Exemple de génération aléatoire
            'nbre_niveau' => fake()->numberBetween(1, 10), // Exemple de génération aléatoire
        ];
    }
}
