<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_name');
            $table->string('room_number');
            $table->unsignedBigInteger('room_category_id');
            $table->integer('room_price');
            $table->unsignedBigInteger('room_status_id');

            $table->foreign('room_category_id')->references('id')->on('room_categories')->onDelete('cascade');
            $table->foreign('room_status_id')->references('id')->on('room_statuses')->onDelete('cascade');;
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
        Schema::dropIfExists('rooms');
    }
}
