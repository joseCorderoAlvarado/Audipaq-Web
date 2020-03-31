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
			if (session()->has('s_tipoUsuario') ) 
			{
				if(session('s_tipoUsuario')=='1')
				{
					return redirect('homePage_Auditor');
				}
				elseif(session('s_tipoUsuario')=='2')
				{
					return redirect('homePage_Auditado');
				}
				elseif(session('s_tipoUsuario')=='3')
				{
					return redirect('homePage_Coauditor');
				}
				elseif(session('s_tipoUsuario')=='4')
				{
					return view ('homePage_Administrador');
				}
			}
			else
			{
				return redirect('/');
			}
		}
		public function mostrar()
		{
			if (session()->has('s_tipoUsuario') ) 
			{
				if(session('s_tipoUsuario')=='1')
				{
					return redirect('homePage_Auditor');
				}
				elseif(session('s_tipoUsuario')=='2')
				{
					return redirect('homePage_Auditado');
				}
				elseif(session('s_tipoUsuario')=='3')
				{
					return redirect('homePage_Coauditor');
				}
				elseif(session('s_tipoUsuario')=='4')
				{
					$listaEmpresas = DB::table('empresa')
					->select('id_empresa','nombre_empresa')
					->orderBy('nombre_empresa','ASC')
					->get(); 

					$listaAuditores = DB::table('persona')
					->join('empresa', 'empresa.id_empresa', '=', 'persona.fk_id_empresa')
					->select('persona.id_persona','persona.nombre_persona','empresa.nombre_empresa','persona.correo_electronico')
					->where('persona.fk_id_tipo','=','1')
					->get(); 
							
					return view('ver_Auditor',['listaEmpresas'=>$listaEmpresas,'listaAuditores'=>$listaAuditores]);
				}
			}
			else
			{
				return redirect('/');
			}	
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
		 	
			if($persona->save()){
			
				\Session::flash('flash_message', '¡Nuevo usuario añadido con éxito');
				return redirect('ver_Auditor');
				
			}
			else {
				return back(); 
			}
		}

		public function modificar()
		{
			return view ('modificar_Auditor');
		}
		
		
	}
?>
