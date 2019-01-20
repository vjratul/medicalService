<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('doctor_description', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('role_id')->unsigned();
         $table->integer('user_id')->unsigned();
         $table->string('type');
         $table->integer('registration_id');
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
        Schema::dropIfExists('doctor_description');
    }
}
