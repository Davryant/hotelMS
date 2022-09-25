<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConferenceBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conference_customers', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->nullable();
            $table->string('phone_number');
            $table->string('gender');
            $table->string('country');
            $table->unsignedBigInteger('idtype')->nullable();
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->unsignedBigInteger('conference_id')->nullable();
            $table->string('id_number')->nullable();
            $table->integer('amount_paid');
            $table->string('datein');
            $table->string('dateout');
            $table->string('slug_c');
            $table->string('status');
            
            $table->foreign('idtype')->references('id')->on('ids');
            $table->foreign('payment_id')->references('id')->on('payment_modes');
            $table->foreign('conference_id')->references('id')->on('conferences');
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
        Schema::dropIfExists('conference_customers');
    }
}
