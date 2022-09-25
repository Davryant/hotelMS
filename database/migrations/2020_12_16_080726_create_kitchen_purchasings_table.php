<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKitchenPurchasingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kitchen_purchasings', function (Blueprint $table) {
            $table->id();
            $table->string('item_number')->unique();
            $table->string('item_name')->unique();
            $table->string('item_unit')->nullable();
            $table->string('unit_price');
            $table->string('measurement');
            $table->string('total_value');
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
        Schema::dropIfExists('kitchen_purchasings');
    }
}
