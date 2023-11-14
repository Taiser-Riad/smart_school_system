<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
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
            'classroom_id'=> '1',
            'fatherName' => $this->faker->firstName,
            'motherFirstName' => $this->faker->firstName,
            'motherLastName' => $this->faker->lastName,
            'fatherPhone'=> $this->faker->phoneNumber,
            'motherPhone'=> $this->faker->phoneNumber,
            'email'=> $this->faker->safeEmail,
            'password'=> $this->faker->password,
            'dateOfBirth'=> $this->faker->date,
            'age'=> $this->faker->numberBetween(8,12),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'schoolYear'=> $this->faker->numberBetween(1,4),
            'group'=> $this->faker->numberBetween(1,4),
            'about'=> $this->faker->paragraph(6),
        ];
    }
}
