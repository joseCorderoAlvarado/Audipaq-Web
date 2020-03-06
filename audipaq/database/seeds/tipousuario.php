<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tipousuario extends Seeder
{
   
    public function run()
    {
        DB::table('tipousuario')-> insert(array('nombre_tipo'=>'auditor'));
        DB::table('tipousuario')-> insert(array('nombre_tipo'=>'auditable'));
        DB::table('tipousuario')-> insert(array('nombre_tipo'=>'coauditado'));
    
    }
}
