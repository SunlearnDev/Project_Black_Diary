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
            $table->string('content');
            $table->unsignedTinyInteger('status');
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('diary_id')->nullable()->constrained('diary')->nullOnDelete();
            $table->foreignId('cmt_id')->nullable()->constrained('comments')->nullOnDelete();
            $table->foreignId('msg_id')->nullable()->constrained('messages')->nullOnDelete();
            $table->foreignId('reaction_id')->nullable()->constrained('reactions')->nullOnDelete();
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
