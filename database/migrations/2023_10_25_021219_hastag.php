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
        Schema::create('hastag', function (Blueprint $table) {
            $table->id('hastag_id'); // khóa chính tự động tăng
            $table->text('content')->nullable(); // content (cho phép giá trị null)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hastag');
    }
};
