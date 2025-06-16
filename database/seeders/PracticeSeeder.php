<?php

namespace Database\Seeders;

use App\Models\Practice;
use Illuminate\Database\Seeder;

class PracticeSeeder extends Seeder
{
    public function run()
    {
        // Crée 10 pratiques
        Practice::factory(10)->create();
    }
}
