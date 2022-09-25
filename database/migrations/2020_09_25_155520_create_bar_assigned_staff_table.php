<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarAssignedStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bar_assigned_staff', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bar_id');
            $table->unsignedBigInteger('staff_id');
            $table->datetime('start_time');
            $table->datetime('end_time');

            $table->foreign('bar_id')->references('id')->on('bars');
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
        Schema::dropIfExists('bar_assigned_staff');
    }
}
