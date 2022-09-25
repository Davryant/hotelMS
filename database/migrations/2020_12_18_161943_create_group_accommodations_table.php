<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupAccommodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_accommodations', function (Blueprint $table) {
            $table->id();
            $table->string('number_of_guests');
            $table->string('room_price_paid');
            $table->date('check_in_date');
            $table->date('check_out_date')->nullable();
            
            // $table->foreign('payment_mode_id')->references('id')->on('payment_modes');
            // $table->foreign('group_id')->references('id')->on('customer_groups');
            // $table->foreign('room_category_id')->references('id')->on('room_categories');
            // $table->foreign('group_status')->references('id')->on('group_statuses');
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
        Schema::dropIfExists('group_accommodations');
    }
}
