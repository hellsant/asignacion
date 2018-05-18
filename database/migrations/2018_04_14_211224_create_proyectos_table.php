<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
		    $table->text('TITULO_PERFIL')->nullable()->default(null);
		    $table->date('FECHA_REGISTRO')->nullable()->default(null);
		    $table->text('GESTION_REGISTRO')->nullable()->default(null);
		    $table->text('GESTION_LIMITE')->nullable()->default(null);
		    $table->text('OBJ_GRAL')->nullable();
		    $table->text('OBJ_ESP')->nullable();
		    $table->text('DESCRIPCION')->nullable();
		    $table->date('FECHA_INI')->nullable()->default(null);
		    $table->date('FECHA_DEF')->nullable()->default(null);
		    $table->text('GESTION_PRORROGA')->nullable()->default(null);
            
		    $table->integer('modalidad_id')->unsigned();
            $table->foreign('modalidad_id')->references('id')->on('modalidades')->onDelete('cascade');

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
        Schema::dropIfExists('proyectos');
    }
}
