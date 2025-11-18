<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pastikan admin ada atau update jika sudah ada
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'username' => 'admin',
                'password' => Hash::make('123'),
                'ktp' => '0000000000000000',
                'nomor_hp' => '081234567890',
                'asal' => 'Admin',
                'profil' => null, // atau path ke foto profil default
                'tanggal_daftar' => now()->toDateString(), // Pastikan format date
                'role' => 'admin', // Pastikan kolom role sudah ada di tabel
            ]
        );
    }
}
