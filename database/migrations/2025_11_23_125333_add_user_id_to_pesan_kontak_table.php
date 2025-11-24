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
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            
            // Add foreign key constraint
            $table->foreign('user_id')
                  ->references('id_users')  // Sesuaikan dengan nama kolom primary key di tabel users
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesan_kontak', function (Blueprint $table) {
            // Drop foreign key first
            $table->dropForeign(['user_id']);
            // Then drop the column
            $table->dropColumn('user_id');
        });
    }
};
