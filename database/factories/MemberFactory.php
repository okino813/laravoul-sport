<?php

namespace Database\Factories;

use App\Models\Member;
use App\Models\User;
use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    protected $model = Member::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'group_id' => Group::factory(),
        ];
    }
}
