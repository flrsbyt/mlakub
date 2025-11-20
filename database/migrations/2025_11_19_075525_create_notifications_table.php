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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // weather, profile, booking, system
            $table->string('title');
            $table->text('message');
            $table->string('icon')->nullable(); // icon class
            $table->string('color')->default('info'); // success, error, warning, info
            $table->boolean('is_read')->default(false);
            $table->morphs('notifiable'); // user yang menerima notifikasi
            $table->json('data')->nullable(); // additional data
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
