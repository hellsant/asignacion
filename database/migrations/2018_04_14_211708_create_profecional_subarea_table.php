<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfecionalSubareaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profecional_subarea', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('profecional_id')->unsigned();
		    $table->foreign('profecional_id')->references('id')->on('profecional')->onDelete('cascade');
            
            $table->integer('subarea_id')->unsigned();
		    $table->foreign('subarea_id')->references('id')->on('subareas')->onDelete('cascade');
            
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
        Schema::dropIfExists('profecional_subarea');
    }
}

