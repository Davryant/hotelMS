<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemIssuedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_issueds', function (Blueprint $table) {
            $table->id();
            $table->string('issue_number');
            $table->string('item_name');
            $table->string('item_quantity');
            $table->string('item_measurement');
            $table->string('issued_by');
            $table->string('issued_to');
            $table->string('issued_comment')->nullable();
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
        Schema::dropIfExists('item_issueds');
    }
}
