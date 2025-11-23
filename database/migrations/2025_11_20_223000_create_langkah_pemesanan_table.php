<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('langkah_pemesanan')) {
            Schema::create('langkah_pemesanan', function (Blueprint $table) {
                $table->id();
                $table->string('judul');
                $table->text('deskripsi');
                $table->string('ikon')->nullable();
                $table->unsignedInteger('urutan')->default(1);
                $table->string('status', 20)->default('aktif');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('langkah_pemesanan');
    }
};
