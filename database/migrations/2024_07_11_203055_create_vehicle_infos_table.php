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
        Schema::create('vehicle_infos', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_reg')->unique();
            $table->string('make');
            $table->string('ODO_meter_reading');
            $table->string('average_run_per_day');
            $table->string('wheel_size');
            $table->string('whl_a_or_o');
            $table->index('customer_id');
            $table->integer('customer_id')->references('id')->on('customers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_infos');
    }
};
