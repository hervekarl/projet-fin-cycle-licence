<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\Medicamment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Acheter>
 */
class AcheterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_patient' => Patient::inRandomOrder()->first(),
            'id_medicamment' => Medicamment::inRandomOrder()->first(),
            'date_achat' => fake()->date(),
            'quantite' => fake()->numberBetween(1, 10),
            'prix_unitaire' => fake()->randomFloat(2, 1, 50),
        ];
    }
}
