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
        Schema::create('website_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('website_name');
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->string('map_link', 1000)->nullable();
            $table->string('complaint_link', 1000)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('fax', 50)->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_profiles');
    }
};
