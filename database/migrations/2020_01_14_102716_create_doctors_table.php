<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('doctor_name_ar');
            $table->text('doctor_name_eng');
            $table->integer('specialtiones_id')->unsigned();
            $table->foreign('specialtiones_id')->references('id')->on('specialtiones')->onDelete('cascade');
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->text('cv_ar');
            $table->text('cv_eng');
            $table->string('phone');
            $table->string('email');
            $table->text('image_doctor');




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
        Schema::dropIfExists('doctors');
    }
}
