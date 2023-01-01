<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class User_RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'role_name'=>$this->faker->unique()->randomElement([
                'Super Admin',
                'Lab Agent',
                'Front Desk',
                'Lab Technician',
                'Lab Patient'
                


            ]),
            'status'=>1,
        ];
    }
}
