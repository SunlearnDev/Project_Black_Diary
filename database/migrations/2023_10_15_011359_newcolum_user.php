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
            $table->date('birthdate')->nullable()->after('gender');
            $table->integer('city_id')->nullable()->after('birthdate');
            $table->integer('district_id')->nullable()->after('city_id');
            $table->integer('role')->after('district_id');
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
