<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Manipuler;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manipuler>
 */
class ManipulerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_user' => User::inRandomOrder()->first(),
            'id_manipuler' => Manipuler::inRandomOrder()->first(),
        ];
    }
}
