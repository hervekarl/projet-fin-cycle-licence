<?php

namespace Database\Factories;

use App\Models\Equipement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipement>
 */
class EquipementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Equipement::class;

    public function definition(): array
    {
        return [
            'nom_equipement' => fake()->word, // Exemple de génération aléatoire
            'type_equipement' => fake()->word, // Exemple de génération aléatoire
        ];    }
}
