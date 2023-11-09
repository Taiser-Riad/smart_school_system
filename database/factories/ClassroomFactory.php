<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Classroom;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $schoolYear = $this->faker->numberBetween(1, 4);
        $group = $this->faker->numberBetween(1, 4);
    
        // Check if a classroom with the same schoolYear and group already exists
        $existingClassroom = Classroom::where('schoolYear', $schoolYear)
            ->where('group', $group)
            ->exists();
    
        // Generate new values until a unique combination is obtained
        while ($existingClassroom) {
            $schoolYear = $this->faker->numberBetween(1, 4);
            $group = $this->faker->numberBetween(1, 4);
    
            $existingClassroom = Classroom::where('schoolYear', $schoolYear)
                ->where('group', $group)
                ->exists();
        }
        return [
            'name' => $this->faker->name,
            'schoolYear'=> $schoolYear,
            'group'=> $group,
            'schedule'=> " Sunday','French','Mathematics','Art','Science','English','Mathematics','Mathematics';
                           Monday','Mathematics','French','Art','Arabic','Science','English','Mathematics';
                           Tuesday','Art','Mathematics','French','Arabic','Science','English','Mathematics';
                           Wednesday','Arabic','Art','Mathematics','French','Science','English','Mathematics';
                           Thursday','Science','Arabic','Art','Mathematics','French','Science','English'",
        ];
    }
}
