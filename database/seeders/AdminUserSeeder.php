<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123'),
            'role' => 'admin',
            'ktp' => '1234567890123456',
            'nomor_hp' => '08123456789',
            'asal' => 'Admin Office',
            'tanggal_daftar' => now(),
            'profil' => null, // Add default null for profile
            'profile_photo' => null, // Add default null for profile photo
        ]);
    }
}
