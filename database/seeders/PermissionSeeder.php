<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $permissions = [
            ['name' => 'view_leave_type', 'group_name' => 'Operations'],
            ['name' => 'add_leave_type', 'group_name' => 'Operations'],
            ['name' => 'update_leave_type', 'group_name' => 'Operations'],
            ['name' => 'delete_leave_type', 'group_name' => 'Operations'],
            ['name' => 'view_leave_request', 'group_name' => 'Operations'],
            ['name' => 'approve_leave_request', 'group_name' => 'Operations'],
            ['name' => 'delete_leave_request', 'group_name' => 'Operations'],
            ['name' => 'view_attendance', 'group_name' => 'Operations', 'guard_name' => 'web']
        ];

        foreach ($permissions as $permission) {
           Permission::updateOrCreate(
                ['name' => $permission['name']],
                ['group_name' => $permission['group_name'], 'guard_name' => 'web']
            );
        }

        $superAdmin = Role::where('name', 'Super Admin')->first();
        if ($superAdmin) {
            $superAdmin->givePermissionTo(Permission::whereIn('name', array_column($permissions, 'name'))->pluck('name')->toArray());
        }
    }
}
