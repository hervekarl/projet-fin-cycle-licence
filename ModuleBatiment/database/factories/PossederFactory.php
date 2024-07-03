<?php

namespace Database\Factories;

use App\Models\Salle;
use App\Models\Equipement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posseder>
 */
class PossederFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date_debut = fake()->dateTimeBetween('-5 year');
        // $date_debut = '2004-07-26';
        $date_fin = fake()->dateTimeBetween('now', 'now');
    
        return [
            'id_salle' => Salle::inRandomOrder()->first(),
            'id_equipement' => Equipement::inRandomOrder()->first(),
            'date_debut' => $date_debut,
            'date_fin' => null,
        ];
        }
    }

