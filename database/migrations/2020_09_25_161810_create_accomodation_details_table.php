<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccomodationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodation_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('payment_mode_id')->nullable();
            $table->unsignedBigInteger('room_category_id');
            $table->unsignedBigInteger('room_id');
            $table->Integer('room_price_applied')->default('0');
            $table->Integer('advanced_payment');
            $table->Integer('payment_status')->default('0');
            $table->date('check_in_date');
            $table->date('check_out_date')->nullable();
            $table->Integer('advanced_payment');
            $table->string('recept_no');

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('payment_mode_id')->references('id')->on('payment_modes');
            $table->foreign('room_category_id')->references('id')->on('room_categories');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('reserver_id')->references('id')->on('reservers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accomodation_details');
    }
}
