<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->unsignedbiginteger('church_id')->nullable();
            $table->foreign('church_id')->references('id')->on('churches');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('location')->nullable();
            $table->decimal('lat')->nullable();
            $table->decimal('lng')->nullable();
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
        Schema::dropIfExists('venues');
    }
}
