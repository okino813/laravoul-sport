<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
{
    public function run()
    {
        // Crée 5 sports
        Sport::factory(5)->create();
    }
}
