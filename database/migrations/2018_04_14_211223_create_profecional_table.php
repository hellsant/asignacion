<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateprofecionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profecional', function (Blueprint $table) {
            $table->increments('id');
		    $table->string('NOM_PROF', 30)->nullable()->default(null);
		    $table->string('AP_PAT_PROF', 30)->nullable()->default(null);
		    $table->string('AP_MAT_PROF', 30)->nullable()->default(null);
		    $table->string('TITULO_PROF', 30)->nullable()->default(null);
		    $table->integer('TELF_PROF')->nullable()->default(null);
		    $table->string('DIREC_PROF', 30)->nullable()->default(null);
		    $table->integer('CI_PROF')->nullable()->default(null);
            $table->integer('COD_SIS_PROF')->nullable()->default(null);
            $table->enum('Tipo', ['Interno', 'Externo']);
		    $table->string('CORREO_PROF', 30)->nullable()->default(null);
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
        Schema::dropIfExists('profecional');
    }
}
