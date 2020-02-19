<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle', function (Blueprint $table) {
            $table-> increments('id_detalle');
            $table-> datetime('fecha');

              $table-> integer('fk_id_area')->unsigned();
              $table-> foreign('fk_id_area')->references('id_area')->on('area');

              $table-> integer('fk_id_persona')->unsigned();
              $table-> foreign('fk_id_persona')->references('id_persona')->on('persona');

              $table-> integer('fk_id_doc')->unsigned();
              $table-> foreign('fk_id_doc')->references('id_doc')->on('doc');

               $table-> integer('fk_id_observaciones')->unsigned();
              $table-> foreign('fk_id_observaciones')->references('id_observaciones')->on('observaciones');

      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle');
    }
}
