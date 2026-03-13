<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Check if admin user already exists
        $admin = User::firstOrCreate(
            ['email' => 'superadmin@gmail.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('12345678'),
            ]
        );

        // Create Super Admin role
        $superAdminRole = Role::firstOrCreate([
            'name' => 'Super Admin',
            'guard_name' => 'web',
        ]);

        // Define all permissions
        $permissions = [
            // User permissions
            ['name' => 'view_customer', 'group_name' => 'customer', 'guard_name' => 'web'],
            ['name' => 'add_customer', 'group_name' => 'customer', 'guard_name' => 'web'],
            ['name' => 'update_customer', 'group_name' => 'customer', 'guard_name' => 'web'],
            ['name' => 'delete_customer', 'group_name' => 'customer', 'guard_name' => 'web'],
            // plans permissions
            ['name' => 'view_regulator', 'group_name' => 'regulator', 'guard_name' => 'web'],
            ['name' => 'add_regulator', 'group_name' => 'regulator', 'guard_name' => 'web'],
            ['name' => 'update_regulator', 'group_name' => 'regulator', 'guard_name' => 'web'],
            ['name' => 'delete_regulator', 'group_name' => 'regulator', 'guard_name' => 'web'],
            // notifications permissions
            ['name' => 'view_corporate', 'group_name' => 'corporate', 'guard_name' => 'web'],
            ['name' => 'add_corporate', 'group_name' => 'corporate', 'guard_name' => 'web'],
            ['name' => 'update_corporate', 'group_name' => 'corporate', 'guard_name' => 'web'],
            ['name' => 'delete_corporate', 'group_name' => 'corporate', 'guard_name' => 'web'],
            // customer permissions
            ['name' => 'view_chamber', 'group_name' => 'chamber', 'guard_name' => 'web'],
            ['name' => 'add_chamber', 'group_name' => 'chamber', 'guard_name' => 'web'],
            ['name' => 'update_chamber', 'group_name' => 'chamber', 'guard_name' => 'web'],
            ['name' => 'delete_chamber', 'group_name' => 'chamber', 'guard_name' => 'web'],
            // team permissions
            ['name' => 'view_branche', 'group_name' => 'branche', 'guard_name' => 'web'],
            ['name' => 'add_branche', 'group_name' => 'branche', 'guard_name' => 'web'],
            ['name' => 'update_branche', 'group_name' => 'branche', 'guard_name' => 'web'],
            ['name' => 'delete_branche', 'group_name' => 'branche', 'guard_name' => 'web'],
            // Rental
            ['name' => 'view_rental', 'group_name' => 'rental', 'guard_name' => 'web'],
            ['name' => 'add_rental', 'group_name' => 'rental', 'guard_name' => 'web'],
            ['name' => 'update_rental', 'group_name' => 'rental', 'guard_name' => 'web'],
            ['name' => 'delete_rental', 'group_name' => 'rental', 'guard_name' => 'web'],

            ['name' => 'view_user', 'group_name' => 'user', 'guard_name' => 'web'],
            ['name' => 'add_user', 'group_name' => 'user', 'guard_name' => 'web'],
            ['name' => 'update_user', 'group_name' => 'user', 'guard_name' => 'web'],
            ['name' => 'delete_user', 'group_name' => 'user', 'guard_name' => 'web'],

            ['name' => 'view_staff', 'group_name' => 'staff', 'guard_name' => 'web'],
            ['name' => 'add_staff', 'group_name' => 'staff', 'guard_name' => 'web'],
            ['name' => 'update_staff', 'group_name' => 'staff', 'guard_name' => 'web'],
            ['name' => 'delete_staff', 'group_name' => 'staff', 'guard_name' => 'web'],

            ['name' => 'view_payroll', 'group_name' => 'payroll', 'guard_name' => 'web'],
            ['name' => 'add_payroll', 'group_name' => 'payroll', 'guard_name' => 'web'],
            ['name' => 'update_payroll', 'group_name' => 'payroll', 'guard_name' => 'web'],
            ['name' => 'delete_payroll', 'group_name' => 'payroll', 'guard_name' => 'web'],

            ['name' => 'view_training', 'group_name' => 'training', 'guard_name' => 'web'],
            ['name' => 'add_training', 'group_name' => 'training', 'guard_name' => 'web'],
            ['name' => 'update_training', 'group_name' => 'training', 'guard_name' => 'web'],
            ['name' => 'delete_training', 'group_name' => 'training', 'guard_name' => 'web'],

            ['name' => 'view_piffersinventory', 'group_name' => 'piffersinventory', 'guard_name' => 'web'],
            ['name' => 'add_piffersinventory', 'group_name' => 'piffersinventory', 'guard_name' => 'web'],
            ['name' => 'update_piffersinventory', 'group_name' => 'piffersinventory', 'guard_name' => 'web'],
            ['name' => 'delete_piffersinventory', 'group_name' => 'piffersinventory', 'guard_name' => 'web'],

            ['name' => 'view_items', 'group_name' => 'items', 'guard_name' => 'web'],
            ['name' => 'add_items', 'group_name' => 'items', 'guard_name' => 'web'],
            ['name' => 'update_items', 'group_name' => 'items', 'guard_name' => 'web'],
            ['name' => 'delete_items', 'group_name' => 'items', 'guard_name' => 'web'],

            ['name' => 'view_campaigns', 'group_name' => 'campaigns', 'guard_name' => 'web'],
            ['name' => 'add_campaigns', 'group_name' => 'campaigns', 'guard_name' => 'web'],
            ['name' => 'update_campaigns', 'group_name' => 'campaigns', 'guard_name' => 'web'],
            ['name' => 'delete_campaigns', 'group_name' => 'campaigns', 'guard_name' => 'web'],

            ['name' => 'view_requirements', 'group_name' => 'requirements', 'guard_name' => 'web'],
            ['name' => 'add_requirements', 'group_name' => 'requirements', 'guard_name' => 'web'],
            ['name' => 'update_requirements', 'group_name' => 'requirements', 'guard_name' => 'web'],
            ['name' => 'delete_requirements', 'group_name' => 'requirements', 'guard_name' => 'web'],

            ['name' => 'view_accessrights', 'group_name' => 'accessrights', 'guard_name' => 'web'],
            ['name' => 'add_accessrights', 'group_name' => 'accessrights', 'guard_name' => 'web'],
            ['name' => 'update_accessrights', 'group_name' => 'accessrights', 'guard_name' => 'web'],
            ['name' => 'delete_accessrights', 'group_name' => 'accessrights', 'guard_name' => 'web'],


            ['name' => 'view_role', 'group_name' => 'role', 'guard_name' => 'web'],
            ['name' => 'add_role', 'group_name' => 'role', 'guard_name' => 'web'],
            ['name' => 'update_role', 'group_name' => 'role', 'guard_name' => 'web'],
            ['name' => 'delete_role', 'group_name' => 'role', 'guard_name' => 'web'],

            ['name' => 'view_leave_type', 'group_name' => 'leave_type', 'guard_name' => 'web'],
            ['name' => 'add_leave_type', 'group_name' => 'leave_type', 'guard_name' => 'web'],
            ['name' => 'update_leave_type', 'group_name' => 'leave_type', 'guard_name' => 'web'],
            ['name' => 'delete_leave_type', 'group_name' => 'leave_type', 'guard_name' => 'web'],

            ['name' => 'view_leave_request', 'group_name' => 'leave', 'guard_name' => 'web'],
            ['name' => 'add_leave_request', 'group_name' => 'leave', 'guard_name' => 'web'],
            ['name' => 'approve_leave_request', 'group_name' => 'leave', 'guard_name' => 'web'],
            ['name' => 'reject_leave_request', 'group_name' => 'leave', 'guard_name' => 'web'],
            ['name' => 'delete_leave_request', 'group_name' => 'leave', 'guard_name' => 'web'],

            
        ];

        // Create or update permissions
        foreach ($permissions as $perm) {
            Permission::firstOrCreate(
                [
                    'name' => $perm['name'],
                    'guard_name' => $perm['guard_name']
                ],
                [
                    'group_name' => $perm['group_name']
                ]
            );
        }

        // Assign all permissions to Super Admin role
        $superAdminRole->syncPermissions(array_column($permissions, 'name'));

        // Assign leave permission to multiple roles
        $roles = ['Super Admin', 'customer', 'user', 'client'];

        foreach ($roles as $roleName) {
            $role = Role::firstOrCreate([
                'name' => $roleName,
                'guard_name' => 'web'
            ]);

            // All roles can view and add leave requests
            $role->givePermissionTo(['view_leave_request', 'add_leave_request']);

            // Only Super Admin can approve/reject
            if ($roleName == 'Super Admin') {
                $role->givePermissionTo(['approve_leave_request', 'reject_leave_request', 'delete_leave_request']);
            }
        }
        // Assign Super Admin role to admin user
        $admin->assignRole('Super Admin');
    }


}

