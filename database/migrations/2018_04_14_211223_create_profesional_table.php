<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateprofesionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesional', function (Blueprint $table) {
            $table->increments('id');
    		    $table->string('NOM_PROF', 30)->nullable()->default(null);
    		    $table->string('AP_PAT_PROF', 30)->nullable()->default(null);
    		    $table->string('AP_MAT_PROF', 30)->nullable()->default(null);
            $table->integer('titulo_id')->unsigned();
            $table->foreign('titulo_id')->references('id')->on('titulos')->onDelete('cascade');
    		    $table->integer('TELF_PROF')->nullable()->defauxefault(null);
    		    $table->integer('CI_PROF')->nullable()->default(null);
            $table->enum('Tipo', ['Interno', 'Externo']);
		        $table->string('CORREO_PROF', 30)->nullable()->default(null);
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
        Schema::dropIfExists('profesional');
    }
}
