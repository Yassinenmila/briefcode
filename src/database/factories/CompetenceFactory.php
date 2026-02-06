<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Competence>
 */
class CompetenceFactory extends Factory
{
    protected $model= \App\Models\Competence::class;

    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->word(),
            'description' => $this->faker->paragraph(),
            'type' => $this->faker->randomElement(['IMITER', 'SADAPTER','TRANSPOSER']),
        ];
    }
}
