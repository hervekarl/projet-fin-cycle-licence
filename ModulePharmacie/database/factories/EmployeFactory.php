<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employe>
 */
class EmployeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numero_employe' => fake()->numberBetween(1, 20),

            // 'nom_employe' => fake()->lastName,
            // 'prenom_employe' => fake()->firstName,
            // 'sexe_employe' => fake()->randomElement(['Masculin', 'Féminin']),
            // 'adresse_employe' => fake()->address,
            // 'tel_employe' => fake()->numerify('##########'),
            // 'date_naiss_employe' => fake()->date(),
            // 'compte_employe' => fake()->unique()->numberBetween(1000, 9999),
            // 'salaire_employe' => fake()->randomFloat(2, 1000, 10000),
        ];
    }
}
