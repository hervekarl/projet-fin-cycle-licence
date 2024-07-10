<?php

namespace Database\Factories;

use App\Models\Fournisseur;
use App\Models\Medicamment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livrer>
 */
class LivrerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_medicamment' => Medicamment::inRandomOrder()->first(),
            'id_fournisseur' => Fournisseur::inRandomOrder()->first(),
            'date_livre' => fake()->date(),
            'quantite' => fake()->numberBetween(10, 100),
            'montant' => fake()->randomFloat(2, 10, 100),
        ];
    }
}
