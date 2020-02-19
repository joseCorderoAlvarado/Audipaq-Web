<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObservacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observaciones', function (Blueprint $table) {
            $table-> increments('id_observaciones');
            $table-> string('comentarios',300);


              $table-> integer('fk_id_status')->unsigned();
              $table-> foreign('fk_id_status')->references('id_status')->on('status');

              $table-> integer('fk_id_auditor')->unsigned();
              $table-> foreign('fk_id_auditor')->references('id_persona')->on('persona');

              $table-> integer('fk_id_acta')->unsigned();
              $table-> foreign('fk_id_acta')->references('id_acta')->on('acta');

              $table-> integer('fk_id_prioridad')->unsigned();
              $table-> foreign('fk_id_prioridad')->references('id_prioridad')->on('prioridad');

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('observaciones');
    }
}
