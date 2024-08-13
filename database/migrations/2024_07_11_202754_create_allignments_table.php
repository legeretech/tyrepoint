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
        Schema::create('allignments', function (Blueprint $table) {
            $table->id();
            $table->string('Manufacturer');
            $table->string('Vehicle_Model');
            $table->string('Mfg')->unique();
            $table->string('rate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allignments');
    }
};
