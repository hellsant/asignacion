<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subareas', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('COD_SUBAREA');
          $table->string('NOMBRE_SUBAREA')->nullable()->default(null);
          $table->text('DESC_SUBAREA')->nullable();
          $table->integer('area_id')->unsigned();
          $table->foreign('area_id')-> references('id')->on('areas')->onDelete('cascade');
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
        Schema::dropIfExists('subareas');
    }
}
