<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table-> increments('id_persona');
            $table-> string('nombre_persona',200);
            $table-> string('apellido_paterno',200);
            $table-> string('apellido_materno',200);
            $table-> string('correo_electronico',100);
            $table-> string('contrasena',200);

            $table-> integer('fk_id_tipo')->unsigned();
            $table-> foreign('fk_id_tipo')->references('id_tipousuario')->on('tipousuario');


           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona');
    }
}
