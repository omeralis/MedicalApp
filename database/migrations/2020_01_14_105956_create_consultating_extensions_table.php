<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultatingExtensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultating_extensions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('consultation_id')->unsigned();
            $table->foreign('consultation_id')->references('id')->on('consultatings')->onDelete('cascade');
            $table->integer('coding');
            $table->text('image_report');
            $table->integer('consultation_status');
            $table->integer('try_number');


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
        Schema::dropIfExists('consultating_extensions');
    }
}
