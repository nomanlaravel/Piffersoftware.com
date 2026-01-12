<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'CRHO Piffers',
            'email' => 'crho.piffers@gmail.com',
            'password' => Hash::make('admin@crho'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'CRN Piffers',
            'email' => 'crn.piffers@gmail.com',
            'password' => Hash::make('admin@crn'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'CRC Piffers',
            'email' => 'crc.piffers@gmail.com',
            'password' => Hash::make('admin@crc'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'CRC2 Piffers',
            'email' => 'crc2.piffers@gmail.com',
            'password' => Hash::make('admin@crc2'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'CRC3 Piffers',
            'email' => 'crc3.piffers@gmail.com',
            'password' => Hash::make('admin@crc3'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'CRS Piffers',
            'email' => 'crs.piffers@gmail.com',
            'password' => Hash::make('admin@crs'),
            'role' => 'user',
        ]);

        // New

        User::create([
            'name' => 'AEO513',
            'email' => 'ae051.3.piffers@gmail.com',
            'password' => Hash::make('admin@ae0513'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'AEO514',
            'email' => 'ae051.4.piffers@gmail.com',
            'password' => Hash::make('admin@ae0514'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'RM1RHQ',
            'email' => 'rm1rhq.piffers@gmail.com',
            'password' => Hash::make('admin@rm1rhq'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'RM2RHQ',
            'email' => 'rm2rhq.piffers@gmail.com',
            'password' => Hash::make('admin@rm2rhq'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'AE1RHQ',
            'email' => 'ae1rhq.piffers@gmail.com',
            'password' => Hash::make('admin@ae1rhq'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'AE2RHQ',
            'email' => 'ae2rhq.piffers@gmail.com',
            'password' => Hash::make('admin@ae2rhq'),
            'role' => 'user',
        ]);

    }
}
