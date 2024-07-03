<?php

namespace Database\Factories;

use App\Models\Salle;
use App\Models\Niveau;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salle>
 */
class SalleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Salle::class;

    public function definition(): array
    {
        return [
            'id_niveau' => Niveau::inRandomOrder()->first(),
            'nom_salle' => fake()->word, // Exemple de génération aléatoire
            'type_salle' => fake()->word, // Exemple de génération aléatoire
        ];    }
}
