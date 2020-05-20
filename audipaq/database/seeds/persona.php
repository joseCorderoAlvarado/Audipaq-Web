<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class persona extends Seeder
{
   
    public function run()
    {
        DB::table('persona')-> insert(array('nombre_persona'=>'Administrador','apellido_paterno'=>'Cordero','apellido_materno'=>'Alvarado','correo_electronico'=>'admin@audipaq.com', 'contrasena'=>md5('Admin12//1'),'fk_id_empresa'=>'1','fk_id_tipo'=>'4'));
 
    }
}
