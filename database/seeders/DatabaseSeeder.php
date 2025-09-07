<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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

        $superAdmin = \App\Models\User::firstOrCreate(
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com',
                'password' => '$2y$10$hrpe9rIiWRjkHiGcQQJL.eHCzNT7Fa523FDURRJ0bzhIWEu/4DM5e',
            ]
        );

        $superAdminRole = Role::firstOrCreate([
            'name' => 'Super_Admin',
            'guard_name' => 'web',
        ]);

        $superAdmin->assignRole($superAdminRole);

        $resources = config('permission.resources');
        $actions = config('permission.actions');

        foreach ($resources as $resourceName) {
            foreach ($actions as $actionName) {
                \Spatie\Permission\Models\Permission::firstOrCreate([
                    'name' => "{$resourceName}.{$actionName}",
                    'guard_name' => 'web',
                ]);
            }
        }

        $superAdminRole->givePermissionTo(\Spatie\Permission\Models\Permission::all());
    }
}
