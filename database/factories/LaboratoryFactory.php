<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LaboratoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lab_name'=>$this->faker->unique()->company(),
            'lab_Ghanapost_gps'=>$this->faker->ean8(),
            'latitude'=> $this->faker->latitude($min = -90, $max = 90),
            'longitude'=> $this->faker->longitude($min = -180, $max = 180),
            'lab_address'=>$this->faker->streetName(),
            'lab_email'=>$this->faker->companyEmail(),
            'lab_phone'=>$this->faker->phoneNumber(),
            'lab_rating'=>$this->faker->numberBetween($min = 0, $max = 5),
            'lab_status'=>$this->faker->numberBetween($min = 1, $max = 3),
            'lab_description'=>$this->faker->text($maxNbChars = 149),
            'lab_images_path'=>$this->faker->imageUrl(),
            'all_tests'=>[
                'key'=>$this->faker->words($nb = 3, $asText = false),
                'value'=>$this->faker->numberBetween($min = 60, $max = 200),
            ],
            'lab_logo_path'=>$this->faker->imageUrl(250, 250),
            

        ];
    }
}
