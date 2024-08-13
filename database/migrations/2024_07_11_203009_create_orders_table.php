<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->index('customer_id');
            $table->index('vehicle_id');
            $table->index('shop_id');
            $table->date('order_date');
            $table->timestamps();
            $table->string('bill_no')->nullable();
            $table->longText('fitment')->nullable();
            $table->integer('tyre_fitment_count')->default(0);

            // Part 4: Wheel Balancing
            $table->longText('balancing')->nullable();
            $table->integer('wheel_balancing_count')->default(0);
            $table->string('weight_lf')->nullable();
            $table->string('weight_rf')->nullable();
            $table->string('weight_lr')->nullable();
            $table->string('weight_rr')->nullable();
            $table->string('weight_stepney')->nullable();
            $table->integer('weight_total')->nullable();

            // Part 5: Wheel Alignment
            $table->longText('alignment_l_f_exst')->nullable();
            $table->longText('alignment_l_f_exst_remarks')->nullable();
            $table->longText('alignment_r_f_exst')->nullable();
            $table->longText('alignment_r_f_exst_remarks')->nullable();
            $table->longText('alignment_l_r_exst')->nullable();
            $table->longText('alignment_l_r_exst_remarks')->nullable();
            $table->longText('alignment_r_r_exst')->nullable();
            $table->longText('alignment_r_r_exst_remarks')->nullable();
            $table->longText('alignment_l_f')->nullable();
            $table->longText('alignment_l_f_remarks')->nullable();
            $table->longText('alignment_r_f')->nullable();
            $table->longText('alignment_r_f_remarks')->nullable();

            // Part 6: Tyre Wear and Air Pressure
            $table->longText('wear_inner_f_l')->nullable();
            $table->longText('wear_inner_f_r')->nullable();
            $table->longText('wear_inner_r_l')->nullable();
            $table->longText('wear_inner_r_r')->nullable();
            $table->longText('wear_inner_stepney')->nullable();
            $table->longText('wear_outer_f_l')->nullable();
            $table->longText('wear_outer_f_r')->nullable();
            $table->longText('wear_outer_r_l')->nullable();
            $table->longText('wear_outer_r_r')->nullable();
            $table->longText('wear_outer_stepney')->nullable();
            $table->longText('wear_uneven_f_l')->nullable();
            $table->longText('wear_uneven_f_r')->nullable();
            $table->longText('wear_uneven_r_l')->nullable();
            $table->longText('wear_uneven_r_r')->nullable();
            $table->longText('wear_uneven_stepney')->nullable();
            $table->longText('air_before_f_l')->nullable();
            $table->longText('air_before_f_r')->nullable();
            $table->longText('air_before_r_l')->nullable();
            $table->longText('air_before_r_r')->nullable();
            $table->longText('air_before_stepney')->nullable();
            $table->longText('air_after_f_l')->nullable();
            $table->longText('air_after_f_r')->nullable();
            $table->longText('air_after_r_l')->nullable();
            $table->longText('air_after_r_r')->nullable();
            $table->longText('air_after_stepney')->nullable();

            // Part 7: Remarks Before Tyre Replacement
            $table->text('before_remarks')->nullable();

            // Part 8: Tyre Purchase Details
            $table->string('tyre_size')->nullable();
            $table->string('tyre_brand')->nullable();
            $table->string('tyre_pattern')->nullable();
            $table->integer('no_of_tyre_purchased')->nullable();
            $table->decimal('tyre_rate', 10, 2)->nullable();
            $table->json('serial_no_alphanum')->nullable();
            $table->json('serial_no_week')->nullable();
            $table->json('serial_no_year')->nullable();

            // Part 9: Additional Services and Pricing
            $table->string('other_option')->nullable();
            $table->longText('other_type')->nullable();
            $table->string('price_tubeless')->nullable();
            $table->string('price_nitrogen')->nullable();
            $table->string('price_tyre_rotation')->nullable();
            $table->string('other_text')->nullable();
            $table->string('price_other_text')->nullable();

            // Part 10: Final Pricing Breakdown
            $table->decimal('tyre_fitment', 10, 2)->nullable();
            $table->decimal('wheel_balancing', 10, 2)->nullable();
            $table->decimal('wheel_alignment', 10, 2)->nullable();
            $table->decimal('gram_weight_used', 10, 2)->nullable();
            $table->decimal('tyre_purchase', 10, 2)->nullable();
            $table->decimal('others', 10, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->decimal('discount_amount', 10, 2)->nullable();
            $table->decimal('net_amount', 10, 2)->nullable();
            $table->decimal('total_gst', 10, 2)->nullable();
            $table->decimal('sgst', 10, 2)->nullable();
            $table->decimal('cgst', 10, 2)->nullable();

            $table->integer('customer_id')->references('id')->on('customers');
            $table->integer('vehicle_id')->references('id')->on('vehicle_infos');
            $table->integer('shop_id')->references('id')->on('users');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
