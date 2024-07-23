<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Module;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            // 'email' => fake()->unique()->safeEmail(),
            'password' => fake()->word, // password
            
            // 'is_admin' => false,
            // 'is_connected' => false,
            
            // 'id_admin'=> User::inRandomOrder()->first()

            // 'can_insert' => false, 
            // 'can_select' => false, 
            // 'can_update' => false, 
            // 'can_delete' => false, 

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    // public function unverified(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'email_verified_at' => null,
    //     ]);
    // }
}
