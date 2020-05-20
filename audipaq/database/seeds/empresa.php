<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class empresa extends Seeder
{
   
    public function run()
    {
                DB::table('empresa')-> insert(array('nombre_empresa'=>'Audipaq','logotipo'=>'','giro'=>'AudipaqGiro','mision'=>'AudipaqMision','vision'=>'AudipaqVision','valores'=>'Audipaqvalores','direccion'=>'AudipaqDireccion','telefono'=>'3241023790','correo_electronico'=>'Audipaq-service@gmail.com'));
    }
}
