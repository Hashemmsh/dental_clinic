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
            'name'=>fake()->word(5,true),
            'age'=>fake()->numberBetween(1,50),
            'gender'=>fake()->titleMale(),
            'address'=>fake()->state(),
            'image'=>fake()->imageUrl(),
            'note'=>fake()->paragraph(5 ,true),
            'doctor_id'=>fake()->numberBetween(1, 10),
            'user_id'=>fake()->numberBetween(1, 10),
        ];
    }
}
