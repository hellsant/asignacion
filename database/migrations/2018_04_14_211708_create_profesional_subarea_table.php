<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesionalSubareaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesional_subarea', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('profesional_id')->unsigned();
		    $table->foreign('profesional_id')->references('id')->on('profesional')->onDelete('cascade');
            
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
        Schema::dropIfExists('profesional_subarea');
    }
}

