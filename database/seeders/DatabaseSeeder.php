<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'testuser',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'ktp' => '1234567890123456',
            'nomor_hp' => '081234567890',
            'asal' => 'Probolinggo',
            'profil' => null,
            'tanggal_daftar' => now()->toDateString(),
        ]);

        $this->call([
            AdminSeeder::class,
        ]);
    }
}
