<?php
namespace App\Http\Controllers;
use App\Http \Controllers\Controller;
use App\persona;
use App\empresa;
use Illuminate\Http\Request;
use DB;

	class Administrador extends Controller
	{
		public function index()
		{
			return view ('homePage_Administrador');
		}
		public function mostrar()
		{
			$listaEmpresas = DB::table('empresa')
			->select('id_empresa','nombre_empresa')
			->orderBy('nombre_empresa','ASC')
			->get(); 
					
			return view('ver_Auditor',['listaEmpresas'=>$listaEmpresas]);
		}

		public function crear(Request $datos)
		{
			$persona = new persona;
		 	$persona->nombre_persona=$datos->input('txtnombreAuditor');
		 	$persona->apellido_paterno=$datos->input('txtapellidoPatAuditor');
		 	$persona->apellido_materno=$datos->input('txtapellidoMatAuditor');
		 	$persona->correo_electronico=$datos->input ('correoAuditor');
		 	$persona->contrasena=md5($datos->input('contraAuditor'));
		 	$persona->fk_id_empresa=$datos->input('fkEmpresa');
		 	$persona->fk_id_tipo='1';
		 	$persona->save();
			return redirect('ver_Auditor');
		}

		public function modificar()
		{
			return view ('modificar_Auditor');
		}
		
		
	}
?>
