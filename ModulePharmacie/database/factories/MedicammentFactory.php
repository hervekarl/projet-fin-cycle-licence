<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicamment>
 */
class MedicammentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'intitule_medicamment' => fake()->word,
            'quantite_medicamment' => fake()->numberBetween(1, 100),
            'categorie_medicamment' => fake()->randomElement(['Antibiotique', 'Anti-inflammatoire', 'Analgésique']),
        ];
    }
}
