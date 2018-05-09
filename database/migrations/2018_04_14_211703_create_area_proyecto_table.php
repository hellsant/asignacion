<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_proyecto', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('area_id')->unsigned();
		    $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
		    
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
        Schema::dropIfExists('area_proyecto');
    }
}
