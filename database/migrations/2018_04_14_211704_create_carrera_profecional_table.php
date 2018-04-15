<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarreraprofecionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrera_profecional', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('carrera_id')->unsigned();
		    $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
            
            $table->integer('profecional_id')->unsigned();
		    $table->foreign('profecional_id')->references('id')->on('profecional')->onDelete('cascade');
           
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
        Schema::dropIfExists('carrera_profecional');
    }
}
