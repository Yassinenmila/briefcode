<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class SprintFactory extends Factory
{
    protected $model= \App\Models\Sprint::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->sentence(3), // Titre du sprint
            'description' => $this->faker->paragraph(), // Description du sprint
            'start_date' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'end_date' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
        ];
    }
}
