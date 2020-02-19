<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table-> increments('id_empresa');
            $table-> string('nombre_empresa',200);
            $table-> string('logotipo')->nullable();
            $table-> string('giro',200);
            $table-> string('mision',200);
            $table-> string('vision',200);
            $table-> string('valores',200);
            $table-> string('direccion',200);
            $table-> string('telefono',200);
            $table-> string('correo_electronico',200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa');
    }
}
