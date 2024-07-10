<?php

namespace Database\Factories;

use App\Models\Employe;
use App\Models\Medicamment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commander>
 */
class CommanderFactory extends Factory
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
            'id_employe' => Employe::inRandomOrder()->first(),
            'date_command' => fake()->date(),
            'quantite' => fake()->numberBetween(1, 50),        
];
    }
}
