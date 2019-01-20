<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeslotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('timeslots', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('doctor_id');
        $table->dateTime('start_time');
        $table->dateTime('end_time');
        $table->integer('duration');
        $table->integer('payment');
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
        Schema::dropIfExists('timeslots');
    }
}
