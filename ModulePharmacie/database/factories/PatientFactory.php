<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom_patient' => fake()->lastName,
            'prenom_patient' => fake()->firstName,
            'age_patient' => fake()->numberBetween(1, 100),
            'sexe_patient' => fake()->randomElement(['Masculin', 'Féminin']),
            'adresse_patient' => fake()->address,
            'tel_patient' => fake()->numerify('##########'),
        ];
    }
}
