<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Test_CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_name'=>$this->faker->unique()->randomElement([
                'Organ function tests',
                'Sexually transmitted infection tests',
                'Screening tests',
                'Infectious disease tests',
                'Nutrient and vitamin level tests',
                'Cholesterol level tests',
            ]),
            'category_status'=>$this->faker->numberBetween($min = 1, $max = 3)
        ];
    }
}
