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
            $table->foreignId('diary_id')->constrained('diary')->onDelete('cascade');
            $table->foreignId('hashtag_id')->constrained('hashtag')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diary_hashtags');
        Schema::rollback();
    }
};
