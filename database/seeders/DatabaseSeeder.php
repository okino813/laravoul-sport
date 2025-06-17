<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
     public function run()
    {
        // Exécuter les seeders
        $this->call([
            UserSeeder::class,
            UnitSeeder::class,
            FieldSeeder::class,
            GroupSeeder::class,
            MemberSeeder::class,
            PracticeSeeder::class,
            SportSeeder::class,
        ]);
    }
}
