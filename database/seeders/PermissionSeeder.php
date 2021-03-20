<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $awardRole = Role::create(['name' => 'award']);
//
//        $freePer = Permission::create(['name' => 'free']);
//        $writerPer = Permission::create(['name' => 'writer']);
//        $poetPer = Permission::create(['name' => 'poet']);
//        $personalityPer = Permission::create(['name' => 'personality']);
//
//        $awardRole->syncPermissions(['free', 'writer', 'poet', 'personality']);


        $permissionsRole = Role::create(['name' => 'permissions']);

    }
}
