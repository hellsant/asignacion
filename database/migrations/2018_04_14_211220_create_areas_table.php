<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('COD_AREA');
		    $table->string('NOMBRE_AREA', 30)->nullable()->default(null);
            $table->text('DESC_AREA')->nullable();	

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
        Schema::dropIfExists('areas');
    }
}
