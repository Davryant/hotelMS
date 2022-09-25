<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bar_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name')->unique();
            $table->string('item_purchase_price');
            $table->string('item_sale_price');
            $table->string('item_quantity');
            $table->unsignedBigInteger('item_category_id');
             $table->unsignedBigInteger('status_id');

            $table->foreign('status_id')->references('id')->on('meal_statuses');

            $table->foreign('item_category_id')->references('id')->on('bar_item_categories');

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
        Schema::dropIfExists('bar_items');
    }
}
