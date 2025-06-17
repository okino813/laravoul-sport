<?php

namespace Database\Seeders;

use App\Models\Field;
use App\Models\Unit;
use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    public function run()
    {
        // Crée 10 champs avec une unité
        Field::factory(10)->create();
    }
}
