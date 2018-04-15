<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateprofecionalProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profecional_proyeto', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('Tipo', ['Tribunal', 'Tutor']);

            $table->integer('profecional_id')->unsigned();
		    $table->foreign('profecional_id')->references('id')->on('profecional')->onDelete('cascade');
            
            $table->integer('proyecto_id')->unsigned();
		    $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
		   
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
        Schema::dropIfExists('profecional_proyeto');
    }
}
