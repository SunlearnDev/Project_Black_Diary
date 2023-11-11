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
        Schema::create('diary_hashtags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diary_id')->references('diary_id')->on('diary')->onDelete('cascade');
            $table->foreignId('hastag_id')->references('hastag_id')->on('hastag')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diary_hashtags');
    }
};
