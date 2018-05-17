<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('FECHA_INI')->nullable()->default(null);
            $table->date('FECHA_FIN')->nullable()->default(null);
            $table->integer('PERIODO')->nullable()->default(null);
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
        Schema::dropIfExists('gestions');
    }
}
