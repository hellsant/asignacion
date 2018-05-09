<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatemotivoprofesionalProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesional_proyeto', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('motivo_id')->unsigned();
            $table->foreign('motivo_id')->references('id')->on('motivos')->onDelete('cascade');

            $table->integer('profesional_id')->unsigned();
		    $table->foreign('profesional_id')->references('id')->on('profesional')->onDelete('cascade');

            $table->integer('proyecto_id')->unsigned();
		    $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
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
        Schema::dropIfExists('profesional_proyeto');
    }
}
