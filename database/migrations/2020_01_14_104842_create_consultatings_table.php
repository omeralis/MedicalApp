<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultatings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->integer('specialtiones_id')->unsigned();
            $table->foreign('specialtiones_id')->references('id')->on('specialtiones')->onDelete('cascade');
            $table->integer('doctor_id')->unsigned();
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->text('consultation_text_ar');
            $table->text('consultation_text_eng');
            $table->integer('consultation_status');
            $table->integer('payment_status');
            $table->date('consultation_date');


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
        Schema::dropIfExists('consultatings');
    }
}
