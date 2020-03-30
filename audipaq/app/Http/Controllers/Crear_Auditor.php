<?php
namespace App\Http\Controllers;
use App\Http \Controllers\Controller;
use User; 
use App\persona;
use App\tipousuario; 

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;

	class Ver_Auditor extends Controller
	{	
		public $timestamps = false;
		public function mostrar()
		{
			$listaUsuario = DB::select('select id_tipousuario, nombre_tipo from tipousuario limit 3'); 
			 
			return view ('ver_Auditor', ['tipousuario'=>$listaUsuario];
		}
		
		public function guardar(Request $datos)
	{
		$contrasena= md5($datos->input('contraAuditor'));
		
		$persona = new persona;
		 //$persona= User::find($datos['id']); 
		 $persona->nombre_persona=$datos->input('txtnombreAuditor');
		 $persona->apellido_paterno=$datos->input('txtapellidoPatAuditor');
		 $persona->apellido_materno=$datos->input('txtapellidoMatAuditor');
		 $persona->correo_electronico=$datos->input ('correoAuditor');
		 $persona->contrasena=$contrasena;
		 $persona->fk_id_empresa=1;
		 $persona->fk_id_tipo=1;

		
		
		 $persona->save();
	
		
			       return redirect('ver_Auditor');
	}
	}
?>
