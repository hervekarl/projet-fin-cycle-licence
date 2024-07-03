<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Salle;
use App\Models\Client;
use App\Models\Product;
use App\Models\Batiment;
use App\Models\Posseder;
use App\Models\Equipement;
use Illuminate\Database\Seeder;
use App\Models\Niveau;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Batiment::factory(20)->create();
        Niveau::factory(20)->create();
        Salle::factory(20)->create();
        Equipement::factory(20)->create();
        Posseder::factory(20)->create();
    }
}
