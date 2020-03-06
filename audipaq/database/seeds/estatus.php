<?php

use Illuminate\Database\Seeder;

class estatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('status')-> insert(array('tipo_status'=>'activo'));
       DB::table('status')-> insert(array('tipo_status'=>'inactivo'));
    }
}
