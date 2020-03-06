<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class prioridad extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('prioridad')-> insert(array('tipo_prioridad'=>'Alta'));
        DB::table('prioridad')-> insert(array('tipo_prioridad'=>'Mediana'));
        DB::table('prioridad')-> insert(array('tipo_prioridad'=>'Baja'));
    }
}
