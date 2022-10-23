<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'address' => fake()->streetAddress(),
            'diagnose' => fake()->word(),
            'diseaseDate' => fake()->date(),
            'chargedDoctorId' => fake()->numberBetween(1, 10),
            'insuranceCode' => fake()->numberBetween(0, 999999),
            'insuranceCompany' => fake()->company()
        ];
    }
}
