<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
    //  Role::create(['name' => 'admin']);
    //  Role::create(['name' => 'spectator']);
    //  Role::create(['name' => 'organizer']);



    // $adminRole = Role::create(['name'=>'admin']);
        // $organisateurRole = Role::create(['name'=>'organisateur']);
        // $spectatorRole = Role::create(['name'=>'spectator']);
        

        // Permission::create(['name' => 'Book_an_event']);

        // Permission::create(['name' => 'Register']);
        // Permission::create(['name' => 'Create_new_event']);
        // Permission::create(['name' => 'Manage_events']);
        // Permission::create(['name' => 'Access_booking_statistics']);

        // Permission::create(['name' => 'Manage_users']);
        // Permission::create(['name' => 'Manage_categories']);
        // Permission::create(['name' => 'Validate_events']);
        // Permission::create(['name' => 'Access_statistics']);




        
        // $adminRole->givePermissionTo('Manage_users','Manage_categories','Validate_events','Access_statistics');
        // $organisateurRole->givePermissionTo('Register', 'Create_new_event', 'Manage_events','Access_booking_statistics');
        // $spectatorRole->givePermissionTo('Book_an_event','Register');
    }
}
