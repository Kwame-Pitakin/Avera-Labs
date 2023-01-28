<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $superAdminRole =  Role::create(['name' => 'Super Admin']);
      $labAgentRole =  Role::create(['name' => 'Lab Agent']);
      $frontDeskRole =  Role::create(['name' => 'Front Desk']);
      $labTechRole =  Role::create(['name' => 'Lab Technician']);
      $labPatientRole =  Role::create(['name' => 'Lab Patient']);
      $unverifiedRole =  Role::create(['name' => 'unverified']);


        $superAdminRole->givePermissionTo([
            // general system users 
            'create-users',
            'edit-users',
            'delete-users',
            'archive-users',

            // lab-workers
            'create-lab-workers',
            'edit-lab-workers',
            'delete-lab-workers',
            'archive-lab-workers',

            // laboratories
            'create-laboratories',
            'edit-laboratories',
            'delete-laboratories',
            'archive-laboratories',
            'list-laboratories',

            // general tests in the system that is available for all labs to add
            'create-tests',
            'list-tests',
            'edit-tests',
            'delete-tests',
            'archive-tests',

            
            'create-sample',
            'edit-sample',
            'delete-sample',
            'archive-sample',
            'add-lab-tests',
            'edit-lab-tests',
            'remove-lab-tests',
            'archive-lab-tests',
            'create-combo',
            'edit-combo',
            'delete-combo',
            'archive-combo',
            'create-bookings',
            'edit-bookings',
            'delete-bookings',
            'archive-bookings',
            'confirm-bookings',
            'create-test-results',
            'edit-test-results',
            'delete-test-results',
            'archive-test-results',
            'create-invoice',
            'edit-invoice',
            'delete-invoice',
            'archive-invoice',

        ]);

        $labAgentRole->givePermissionTo([
            'create-lab-workers',
            'edit-lab-workers',
            'archive-lab-workers',

            // labs
            'create-laboratories',
            'edit-laboratories',
            'archive-laboratories',
            
            //adding test to lab
            'add-lab-tests',
            'edit-lab-tests',
            'remove-lab-tests',
            'archive-lab-tests',

            // test combos
            'create-combo',
            'edit-combo',
            'delete-combo',
            'archive-combo',
        ]);



        $frontDeskRole->givePermissionTo([
            'create-invoice',
            'edit-invoice',
            'archive-invoice',
        ]);


        $labTechRole->givePermissionTo([
            'create-test-results',
            'edit-test-results',
            'archive-test-results',
        ]);

        $labPatientRole->givePermissionTo([
            'create-bookings',
            'edit-bookings',
            'delete-bookings',
            'archive-bookings',
            'confirm-bookings',
        ]);
    }
}
