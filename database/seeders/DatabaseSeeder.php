<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Laboratory;
use App\Models\Laboratory_Test;
use App\Models\Sample;
use App\Models\Sample_Test;
use App\Models\Test;
use App\Models\Test_category;
use App\Models\Test_price;
use App\Models\Test_Sample;
use Illuminate\Database\Seeder;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Laboratory::factory(20)->create();
        Test_category::factory(6)->create();
        Sample::factory(7)->create();
        Test::factory(20)->create();
        Test_price::factory(20)->create();
        // Laboratory_Test::factory(60)->create();
        // Sample_Test::factory(20)->create();

       
    }
}
