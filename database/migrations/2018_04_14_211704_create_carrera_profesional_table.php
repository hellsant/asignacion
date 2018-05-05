<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarreraprofesionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrera_profesional', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('carrera_id')->unsigned();
		    $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
            
            $table->integer('profesional_id')->unsigned();
		    $table->foreign('profesional_id')->references('id')->on('profesional')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('carrera_profesional');
    }
}
