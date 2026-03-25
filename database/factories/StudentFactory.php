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
            //
            "name"=>$this->faker->name(),
            "lastName"=>$this->faker->lastName(),
            "Date-of-birth"=>$this->faker->date(),
            "score"=>$this->faker->numberBetween(10,100),
            "gender"=>$this->faker->randomElement(["f","m"]),
             "Age"=>$this->faker->numberBetween(16,50),
        ];
    }
}
