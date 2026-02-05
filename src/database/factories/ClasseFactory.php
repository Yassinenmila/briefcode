<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClasseFactory extends Factory
{

    protected $model= \App\Models\Classe::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'promotion' => $this->faker->year(),
        ];
    }
}
