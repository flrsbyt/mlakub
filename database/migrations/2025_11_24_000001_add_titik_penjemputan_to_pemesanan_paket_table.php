<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pemesanan_paket', function (Blueprint $table) {
            if (!Schema::hasColumn('pemesanan_paket', 'titik_penjemputan')) {
                $table->string('titik_penjemputan', 255)->nullable()->after('tanggal_keberangkatan');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pemesanan_paket', function (Blueprint $table) {
            if (Schema::hasColumn('pemesanan_paket', 'titik_penjemputan')) {
                $table->dropColumn('titik_penjemputan');
            }
        });
    }
};
