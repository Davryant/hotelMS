<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantAssignStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_assign_staff', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restraurant_id');
            $table->unsignedBigInteger('staff_id');
            $table->datetime('start_time');
            $table->datetime('end_time');

            $table->foreign('restraurant_id')->references('id')->on('restaurants');
            $table->foreign('staff_id')->references('id')->on('users');

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
        Schema::dropIfExists('restaurant_assign_staff');
    }
}
