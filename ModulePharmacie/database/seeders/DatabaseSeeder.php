<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Livrer;
use App\Models\Acheter;
use App\Models\Employe;
use App\Models\Patient;
use App\Models\Commander;
use App\Models\Fournisseur;
use App\Models\Medicamment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Patient::factory(20)->create();
        Employe::factory(20)->create();
        Medicamment::factory(20)->create();
        Fournisseur::factory(20)->create();
        Acheter::factory(20)->create();
        Commander::factory(20)->create();
        Livrer::factory(20)->create();

    }
}
