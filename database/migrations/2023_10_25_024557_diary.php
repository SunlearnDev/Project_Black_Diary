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
        Schema::create('diary', function (Blueprint $table) {
            $table->id('diary_id'); // khóa chính tự động tăng
            $table->string('image')->nullable(); // image (cho phép giá trị null)
            $table->string('title')->nullable(); // name
            $table->text('content')->nullable(); // content (cho phép giá trị null)
            $table->integer('order');
            $table->foreignId('id')->constrained('users', 'id')->onDelete('cascade');
            $table->foreignId('id_hastag')->constrained('hastag', 'hastag_id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diary');
    }
};
