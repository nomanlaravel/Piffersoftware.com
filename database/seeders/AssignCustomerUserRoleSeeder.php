<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AssignCustomerUserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find the user by email
        $user = User::where('email', 'ata10plus10@gmail.com')->first();

        if (!$user) {
            $this->command->error('User with email ata10plus10@gmail.com not found!');
            return;
        }

        // Find the Customer User role
        $role = Role::where('name', 'Customer User')->first();

        if (!$role) {
            $this->command->error('Customer User role not found! Please run CustomerRoleSeeder first.');
            return;
        }

        // Assign the role to the user
        if (!$user->hasRole('Customer User')) {
            $user->assignRole('Customer User');
            $this->command->info('Customer User role assigned successfully to: ' . $user->email);
        } else {
            $this->command->info('User already has the Customer User role.');
        }

        // Display user's permissions
        $permissions = $user->getAllPermissions()->pluck('name')->toArray();
        $this->command->info('User permissions: ' . implode(', ', $permissions));
    }
}
