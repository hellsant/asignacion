<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectoSubareaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_subarea', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proyecto_id')->unsigned();
		    $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
		    
		    $table->integer('subarea_id')->unsigned();
		    $table->foreign('subarea_id')->references('id')->on('subareas')->onDelete('cascade');
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
        Schema::dropIfExists('proyecto_subarea');
    }
}
