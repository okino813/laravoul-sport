<?php

namespace Database\Factories;

use App\Models\Practice;
use App\Models\Group;
use App\Models\User;
use App\Models\Sport;
use Illuminate\Database\Eloquent\Factories\Factory;

class PracticeFactory extends Factory
{
    protected $model = Practice::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'group_id' => Group::factory(),
            'sport_id' => Sport::factory(),
            'user_id' => User::factory(),
        ];
    }
}
