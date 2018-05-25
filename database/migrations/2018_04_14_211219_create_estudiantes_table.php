<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('COD_SIS');
    		    $table->string('NOM_EST', 30);
    		    $table->string('AP_PAT_EST', 30)->nullable()->default(null);
    		    $table->string('AP_MAT_EST', 30)->nullable()->default(null);
            $table->integer('CI');
            $table->integer('TELF')->nullable()->default(null);
		        $table->string('CORRETO_EST', 30)->nullable()->default(null);
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
        Schema::dropIfExists('estudiantes');
    }
}
