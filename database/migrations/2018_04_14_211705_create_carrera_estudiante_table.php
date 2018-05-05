<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarreraEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrera_estudiante', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('carrera_id')->unsigned();
		    $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
            
            $table->integer('estudiante_id')->unsigned();
		    $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');
            
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
        Schema::dropIfExists('carrera_estudiante');
    }
}
