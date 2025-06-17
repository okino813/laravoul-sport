<?php
// database/factories/FieldFactory.php

namespace Database\Factories;

use App\Models\Field;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

class FieldFactory extends Factory
{
    protected $model = Field::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'unit_id' => Unit::factory(), // Création d'un champ avec une unité associée
        ];
    }
}
