<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    
    protected static ?string $password;

    protected $model = \App\Models\User::class;

    
    public function definition(): array
    {
        return [
            'nom'=>$this->faker->lastName(),
            'prenom'=>$this->faker->firstname(),
            'date_naissance'=>$this->faker->date(),
            'roles'=>$this->faker->randomElement(['admin','teacher','student']),
            'cin' => strtoupper($this->faker->bothify('??#####')),
            'email'=>$this->faker->unique()->safeEmail(),
            'password'=>Hash::make('password'),
            'telephone'=>$this->faker->numerify('06########'),
        ];
    }
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
