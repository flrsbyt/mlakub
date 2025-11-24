<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pesan_kontak', function (Blueprint $table) {
            $table->timestamp('dibaca_pada')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesan_kontak', function (Blueprint $table) {
            $table->dropColumn('dibaca_pada');
        });
    }
};
