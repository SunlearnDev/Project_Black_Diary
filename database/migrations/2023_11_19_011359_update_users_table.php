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
        Schema::table('users', function (Blueprint $table) {
            $table->string('other_name')->nullable();
            $table->string('avatar')->nullable();
            $table->string('about', 500)->nullable();
            $table->string('phone', 10)->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->date('birthdate')->nullable();
            $table->foreignId('city_id')->nullable()->constrained('citys')->nullOnDelete();
            $table->foreignId('district_id')->nullable()->constrained('districts')->nullOnDelete();
            $table->unsignedTinyInteger('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
