<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);
        Permission::create(['name' => 'archive-users']);

        // Laboratories
        Permission::create(['name' => 'create-laboratories']);
        Permission::create(['name' => 'edit-laboratories']);
        Permission::create(['name' => 'delete-laboratories']);
        Permission::create(['name' => 'archive-laboratories']);

        // tests
        Permission::create(['name' => 'create-tests']);
        Permission::create(['name' => 'edit-tests']);
        Permission::create(['name' => 'delete-tests']);
        Permission::create(['name' => 'archive-tests']);

        // test samples {eg: blood , saliver}
        Permission::create(['name' => 'create-sample']);
        Permission::create(['name' => 'edit-sample']);
        Permission::create(['name' => 'delete-sample']);
        Permission::create(['name' => 'archive-sample']);

        // tests is labs
        Permission::create(['name' => 'add-tests']);  //adding tests to laboratory
        Permission::create(['name' => 'remove-tests']); // remove tests from laboratory list
        Permission::create(['name' => 'archive-tests']); // archive tests from laboratory list
       

        // combos in laboratories {combos are created in laboratopries}
        Permission::create(['name' => 'create-combo']); 
        Permission::create(['name' => 'edit-combo']);
        Permission::create(['name' => 'delete-combo']);
        Permission::create(['name' => 'archive-combo']);


        // booking lab tests
        Permission::create(['name' => 'create-bookings']);
        Permission::create(['name' => 'edit-bookings']);
        Permission::create(['name' => 'delete-bookings']);
        Permission::create(['name' => 'view-bookings']);
        Permission::create(['name' => 'confirm-bookings']);


        // Test Results
        Permission::create(['name' => 'create-test-results']);
        Permission::create(['name' => 'edit-test-results']);
        Permission::create(['name' => 'delete-test-results']);
        Permission::create(['name' => 'archive-test-results']);


        // invoice
        Permission::create(['name' => 'create-invoice']);
        Permission::create(['name' => 'edit-invoice']);
        Permission::create(['name' => 'delete-invoice']);
        Permission::create(['name' => 'archive-invoice']);

    }
}
