<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acta', function (Blueprint $table) {
            $table-> increments('id_acta');
            $table-> datetime('fecha_inicio');
            $table-> datetime('fecha_final');

              $table-> integer('fk_id_persona')->unsigned();
              $table-> foreign('fk_id_persona')->references('id_persona')->on('persona');

              $table-> integer('fk_id_auditor')->unsigned();
              $table-> foreign('fk_id_auditor')->references('id_persona')->on('persona');

              $table-> integer('fk_id_status')->unsigned();
              $table-> foreign('fk_id_status')->references('id_status')->on('status');

              $table-> integer('fk_id_area')->unsigned();
              $table-> foreign('fk_id_area')->references('id_area')->on('area');

               $table-> integer('fk_id_departamento')->unsigned();
              $table-> foreign('fk_id_departamento')->references('id_departamento')->on('departamento');

            
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acta');
    }
}
