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
            $table->string('other_name')->nullable()->after('password')->length(255);
            $table->string('avatar')->nullable()->after('other_name');
            $table->string('about')->nullable()->after('avatar')->length(500);
            $table->string('phone')->nullable()->after('about')->length(10);
            $table->string('address')->nullable()->after('phone')->length(255);
            $table->string('gender')->nullable()->after('address');
            $table->string('google_id')->nullable()->after('gender');
            $table->date('birthdate')->nullable()->after('google_id');
            $table->foreignId('city_id')->nullable()->constrained('citys')->nullOnDelete();
            $table->foreignId('district_id')->nullable()->constrained('districts')->nullOnDelete();
            $table->unsignedTinyInteger('role')->after('district_id');
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