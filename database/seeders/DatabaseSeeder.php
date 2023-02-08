<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

// use App\Models\Role;
use App\Models\Test;
use App\Models\User;
use App\Models\Sample;
use App\Models\Laboratory;
use App\Models\Test_price;
use App\Models\Sample_Test;
use App\Models\Test_Sample;
use Illuminate\Support\Str;
use App\Models\Test_category;
use App\Models\Laboratory_Test;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
        ]);





        //     $user->assignRole('Super Admin');
        $user =  User::create([
            'fullname' => 'Skyller Bolingo',
            'email' => 'skyller@avera.com',
            'phone' => '0332273910',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'status_id' =>1,

        ]);
        $user->assignRole('Super Admin');

        //  labagent
        $user =  User::create([
            'fullname' => 'Afi Dede',
            'email' => 'dede@avera.com',
            'phone' => '0333373910',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'status_id' =>1,

        ]);
        $user->assignRole('Lab Agent');

        //  FrontDesk
        $user =  User::create([
            'fullname' => 'Benjamin Mba',
            'email' => 'benjamin@avera.com',
            'phone' => '0334473910',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'status_id' =>1,

        ]);
        $user->assignRole('Front Desk');

        //  Labtech
        $user =  User::create([
            'fullname' => 'George Agyemang',
            'email' => 'george@avera.com',
            'phone' => '0335573910',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'status_id' =>1,

        ]);
        $user->assignRole('Lab Technician');


        //  patient
        $user =  User::create([
            'fullname' => 'Eugenia Mensah',
            'email' => 'eugenia@avera.com',
            'phone' => '0336673910',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'status_id' =>1,

        ]);
        $user->assignRole('Lab Patient');



        Laboratory::factory(20)->create();
        Test_category::factory(6)->create();
        Sample::factory(7)->create();
        Test::factory(20)->create();
        Test_price::factory(20)->create();
    }
}
