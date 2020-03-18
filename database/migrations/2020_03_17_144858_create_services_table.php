<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->unsignedbiginteger('church_id')->nullable();
            $table->foreign('church_id')->references('id')->on('churches');
            $table->unsignedbiginteger('service_type_id')->nullable();
            $table->foreign('service_type_id')->references('id')->on('service_types');
            $table->unsignedbiginteger('venue_id')->nullable();
            $table->foreign('venue_id')->references('id')->on('venues');
            $table->string('title')->nullable();
            $table->string('type')->nullable();
            $table->string('description')->nullable();
            $table->string('link')->nullable();
            $table->string('platform')->nullable();
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
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
        Schema::dropIfExists('services');
    }
}
