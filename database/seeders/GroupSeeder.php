<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    public function run()
    {
        // Crée 5 groupes avec des utilisateurs associés
        Group::factory(5)->create();
    }
}
