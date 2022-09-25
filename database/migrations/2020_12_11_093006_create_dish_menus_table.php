<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_menus', function (Blueprint $table) {
            $table->id();
            $table->string('food_item_name');
            $table->double('food_item_price');
            $table->unsignedBigInteger('item_category');
            $table->string('dish_cover');
            $table->timestamps();

            $table->foreign('item_category')->references('id')->on('dish_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dish_menus');
    }
}
