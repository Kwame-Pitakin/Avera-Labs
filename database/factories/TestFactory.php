<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Test>
 */
class TestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'test_name'=>$this->faker->unique()->randomElement([
                'Hepatitis B',
                'HIV',
                'Trichomoniasis',
                'Genital Herpes',
                'Gonorrhea',
                'Hepatitis C',
                'HPV',
                'chlamydia',
                'syphilis',
                'Vitamin D',
                'lipid panel',
                'HbA1c',
                'bilirubin',
                'creatinine',
                'complete blood count',
                'pap smear',
                'urinalysis',
                'strep throat',
                'mononucleosis',
                'triglycerides',


            ]),
            'accurate_from'=>$this->faker->numberBetween($min = 3, $max = 200),
            'test_category_id'=>$this->faker->numberBetween($min= 1, $max=6),
            // 'test_sample_id'=>$this->faker->numberBetween($min=1, $max=7),
            'test_status'=>$this->faker->numberBetween($min = 1, $max = 3),
            'target_gender'=>$this->faker->randomElement(['male', 'female', 'all'])

        ];
    }
}
