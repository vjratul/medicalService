<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('bookings', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('doctor_id');
          $table->integer('user_id');
          $table->integer('timeslots_id');
          $table->longText('disease_description');
          $table->integer('payment');
          $table->integer('booking_status_id');
          $table->dateTime('start_time');
          $table->dateTime('end_time');
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
        Schema::dropIfExists('bookings');
    }
}
