<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name')->unique();
            $table->string('item_price');
            $table->unsignedBigInteger('item_category_id');
            $table->unsignedBigInteger('status_id');

            $table->foreign('status_id')->references('id')->on('meal_statuses');
            $table->foreign('item_category_id')->references('id')->on('restaurant_item_categories');
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
        Schema::dropIfExists('restaurant_items');
    }
}
