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

        Role::create(['name' => 'superAdmin']);

        // start award permission
        $awardRole = Role::create(['name' => 'award']);
        Permission::create(['name' => 'free']);
        Permission::create(['name' => 'writer']);
        Permission::create(['name' => 'poet']);
        Permission::create(['name' => 'personality']);
        $awardRole->syncPermissions(['free', 'writer', 'poet', 'personality']);
        // end award permission

        // gev permissions
         Role::create(['name' => 'permissions']);
        // end permissions

        //start yaseen per
        $yaseenImageRole = Role::create(['name' => 'yaseenImages']);
        Permission::create(['name' => 'yaseenEditImage']);
        Permission::create(['name' => 'yaseenDeleteImage']);
        Permission::create(['name' => 'yaseenUpdateImage']);
        Permission::create(['name' => 'yaseenCreateImage']);
        $yaseenImageRole->syncPermissions(['yaseenEditImage', 'yaseenDeleteImage', 'yaseenUpdateImage', 'yaseenCreateImage']);
        // end yaseen per


        // start video
        $yaseeVideosRole = Role::create(['name' => 'yaseenVideos']);
        Permission::create(['name' => 'yaseenEditVideo']);
        Permission::create(['name' => 'yaseenDeleteVideo']);
        Permission::create(['name' => 'yaseenUpdateVideo']);
        Permission::create(['name' => 'yaseenCreateVideo']);
        $yaseeVideosRole->syncPermissions(['yaseenEditVideo', 'yaseenDeleteVideo', 'yaseenUpdateVideo', 'yaseenCreateVideo']);
        // end start video


        // start stuff
        $yaseenStuffRole = Role::create(['name' => 'yaseenStuff']);
        Permission::create(['name' => 'yaseenEditStuff']);
        Permission::create(['name' => 'yaseenDeleteStuff']);
        Permission::create(['name' => 'yaseenUpdateStuff']);
        Permission::create(['name' => 'yaseenCreateStuff']);
        $yaseenStuffRole->syncPermissions(['yaseenEditStuff', 'yaseenDeleteStuff', 'yaseenUpdateStuff', 'yaseenCreateStuff']);

        // end start stuff

        // start stuff
        $mediaRole = Role::create(['name' => 'mediaCenter']);
        Permission::create(['name' => 'contactUs']);
        Permission::create(['name' => 'lastNews']);
        Permission::create(['name' => 'logoFoundations']);
        Permission::create(['name' => 'tellAboutUs']);
        Permission::create(['name' => 'imagesShow']);
        Permission::create(['name' => 'videosShow']);
        $mediaRole->syncPermissions(['contactUs', 'lastNews', 'logoFoundations', 'tellAboutUs', 'imagesShow', 'videosShow']);
        // end start stuff
    }
}
