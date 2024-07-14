<?php

namespace Database\Factories;

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
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => 'z', // password

            'can_insert' => false, 
            'can_select' => false, 
            'can_update' => false, 
            'can_delete' => false, 
            'is_admin' => fake()->randomElement([false, true]), 

            'is_connected' => false,

            'id_module'=> Module::inRandomOrder()->first()
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
