<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Headmaster>
 */
class HeadmasterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'img'=> NULL,
            'age'=> $this->faker->numberBetween(20,50),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'email'=> $this->faker->safeEmail,
            'password'=> $this->faker->password,
        ];
    }
}
