<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pemesanan_paket', function (Blueprint $table) {
            if (!Schema::hasColumn('pemesanan_paket', 'metode_pembayaran')) {
                $table->string('metode_pembayaran', 50)->nullable()->after('total');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pemesanan_paket', function (Blueprint $table) {
            if (Schema::hasColumn('pemesanan_paket', 'metode_pembayaran')) {
                $table->dropColumn('metode_pembayaran');
            }
        });
    }
};
