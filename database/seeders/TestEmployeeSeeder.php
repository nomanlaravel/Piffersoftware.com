<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::updateOrCreate(
            ['email' => 'employee@example.com'],
            [
                'name' => 'Test Employee',
                'password' => \Illuminate\Support\Facades\Hash::make('password123'),
                'role' => 'user'
            ]
        );

        $role = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'Employee']);
        $role->syncPermissions(['view_leave_request']);

        $user->assignRole($role);
    }
}
