<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name'=>'Administrator']);
        $roleCoord = Role::create(['name'=>'Coordinator']);
        Permission::create(['name'=>'createSchool'])->assignRole($roleAdmin);
        Permission::create(['name'=> 'seeSchools'])->assignRole($roleAdmin);
        Permission::create(['name'=>'createCoordinator'])->assignRole($roleAdmin);
        Permission::create(['name'=> 'seeCoordinators'])->assignRole($roleAdmin);
    }
}
