<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        if (!Schema::hasTable('pemesanan_paket')) {
            Schema::create('pemesanan_paket', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id')->nullable();
                $table->string('paket', 150);
                $table->unsignedInteger('peserta');
                $table->date('tanggal_keberangkatan');
                $table->unsignedBigInteger('total')->default(0);
                $table->enum('status', ['menunggu', 'dikonfirmasi', 'selesai', 'dibatalkan'])->default('menunggu');
                $table->text('catatan')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void {
        Schema::dropIfExists('pemesanan_paket');
    }
};
