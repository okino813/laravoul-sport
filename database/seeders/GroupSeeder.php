<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    public function run()
    {
        $user = User::factory()->create([
            'firstname' => 'admin',
            'lastname' => 'admin',
            'email' => 'admin@example.com',
        ]);

        Group::create([
            'name' => 'Pas de groupe',
            'user_id' => $user->id,
        ]);

        // Crée 5 groupes avec des utilisateurs associés
        Group::factory(5)->create();
    }
}
