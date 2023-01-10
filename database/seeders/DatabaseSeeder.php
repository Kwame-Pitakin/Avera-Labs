<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\Test;
use App\Models\User;
use App\Models\Sample;
use App\Models\Laboratory;
use App\Models\Test_price;
use App\Models\Sample_Test;
use App\Models\Test_Sample;
use App\Models\Test_category;
use App\Models\Laboratory_Test;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Role::factory(5)->create();

       $user = User::factory()->create([
            'fullname' => 'Skyller Bolingo',
            'email' => 'skyller@avera.com',
            'phone'=> '0332273910',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role_id'=>'5'
        ]);



        Laboratory::factory(20)->create([
            'user_id'=>$user->id
        ]);
        Test_category::factory(6)->create();
        Sample::factory(7)->create();
        Test::factory(20)->create();
        Test_price::factory(20)->create();
        // Laboratory_Test::factory(60)->create();
        // Sample_Test::factory(20)->create();

       
    }
}
