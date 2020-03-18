<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->unsignedbiginteger('church_id')->nullable();
            $table->foreign('church_id')->references('id')->on('churches');
            $table->unsignedbiginteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedbiginteger('service_id')->nullable();
            $table->foreign('service_id')->references('id')->on('services');
            $table->integer('count')->nullable();
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
        Schema::dropIfExists('attendance');
    }
}
