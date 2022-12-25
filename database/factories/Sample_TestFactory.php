<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Sample_TestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'test_id'=>$this->faker->unique()->numberBetween($min=1, $max=20),
            'sample_id'=>$this->faker->numberBetween($min=1, $max=7),

        ];
    }
}
