<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventServicePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_service', function (Blueprint $table) {
            $table->unsignedbiginteger('event_id')->unsigned()->index();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->unsignedbiginteger('service_id')->unsigned()->index();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->bigincrements("id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('event_service');
    }
}
