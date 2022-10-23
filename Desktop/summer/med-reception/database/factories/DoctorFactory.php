<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'officeNumber' => fake()->numberBetween(0, 999),
            'areaNumber' => fake()->numberBetween(0, 999),
            'workingDays' => 'Weekdays',
            'startTime' => fake()->time('8:00:00'),
            'endTime' => fake()->time('14:00:00')
        ];
    }
}
