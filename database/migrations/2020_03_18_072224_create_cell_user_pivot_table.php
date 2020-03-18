<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCellUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cell_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbiginteger('cell_id')->unsigned()->index();
            $table->foreign('cell_id')->references('id')->on('cells')->onDelete('cascade');
            $table->unsignedbiginteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cell_user');
    }
}
