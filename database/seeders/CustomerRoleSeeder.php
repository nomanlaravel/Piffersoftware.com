<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CustomerRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the next available ID for the roles table
        $maxId = DB::table('roles')->max('id');
        $nextId = $maxId ? $maxId + 1 : 1;

        // Check if role already exists
        $existingRole = DB::table('roles')->where('name', 'Customer User')->first();

        if (!$existingRole) {
            // Insert role manually with explicit ID
            DB::table('roles')->insert([
                'id' => $nextId,
                'name' => 'Customer User',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $this->command->info('Customer User role created with ID: ' . $nextId);
        } else {
            $nextId = $existingRole->id;
            $this->command->info('Customer User role already exists with ID: ' . $nextId);
        }

        // Get the role
        $role = Role::find($nextId);

        // Define permissions that customer users should have
        $permissionsToAssign = [
            'view_customer',
            'view_staff',
        ];

        // Get or create permissions and assign to role
        foreach ($permissionsToAssign as $permissionName) {
            // Check if permission exists
            $permission = Permission::where('name', $permissionName)->first();

            if (!$permission) {
                $this->command->warn("Permission '{$permissionName}' does not exist. Skipping...");
                continue;
            }

            // Assign permission to role if not already assigned
            if (!$role->hasPermissionTo($permission)) {
                $role->givePermissionTo($permission);
                $this->command->info("Assigned permission: {$permissionName}");
            } else {
                $this->command->info("Permission already assigned: {$permissionName}");
            }
        }

        $this->command->info('Customer User role setup completed!');
    }
}
