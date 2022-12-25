<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laboratory_Test>
 */
class Laboratory_TestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'test_price'=>$this->faker->numberBetween($min = 50, $max = 200),
            'test_price'=>$this->faker->numberBetween($min = 2, $max = 30),
            'laboratory_id'=>$this->faker->numberBetween($min = 1, $max = 20),
            'test_id'=>$this->faker->numberBetween($min = 1, $max = 20),

        ];
    }
}
