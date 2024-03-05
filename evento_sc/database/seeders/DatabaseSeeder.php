<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call(RoleSeeder::class);$this->call(AdminSeeder::class);



        
        // $adminRole = Role::create(['name'=>'admin']);
        // $organizerRole = Role::create(['name'=>'organizer']);
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
        // $organizerRole->givePermissionTo('Register', 'Create_new_event', 'Manage_events','Access_booking_statistics');
        // $spectatorRole->givePermissionTo('Book_an_event','Register');
        
    }
}
