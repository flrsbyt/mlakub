<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_users');
            $table->string('username', 100);
            $table->string('password');
            $table->string('email', 100)->unique();
            $table->string('ktp', 20);
            $table->string('nomor_hp', 15);
            $table->string('asal', 100);
            $table->string('profil')->nullable(); // bisa link foto atau text
            // Catatan: Beberapa versi MySQL/MariaDB tidak mengizinkan default ekspresi untuk DATE
            // Gunakan nullable lalu set nilai saat insert (seeder/controller)
            $table->date('tanggal_daftar')->nullable();
        });
    }

    public function down(): void {
        Schema::dropIfExists('users');
    }
};
