<?php

namespace Database\Factories;

use App\Models\Niveau;
use App\Models\Batiment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Niveau>
 */
class NiveauFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'id_batiment' => Batiment::inRandomOrder()->first(),
            'nbre_salle' => fake()->numberBetween(1, 20), // Exemple de génération aléatoire
            'numero_etage' => fake()->numberBetween(1, 20), // Exemple de génération aléatoire
        ];
    }
}