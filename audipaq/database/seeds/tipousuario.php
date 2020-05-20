<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tipousuario extends Seeder
{
   
    public function run()
    {
        DB::table('tipousuario')-> insert(array('nombre_tipo'=>'auditor'));
        DB::table('tipousuario')-> insert(array('nombre_tipo'=>'auditado'));
        DB::table('tipousuario')-> insert(array('nombre_tipo'=>'coauditador'));
        DB::table('tipousuario')-> insert(array('nombre_tipo'=>'administrador'));
    
    }
}
