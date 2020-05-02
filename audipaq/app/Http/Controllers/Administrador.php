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
					->select('persona.id_persona','persona.nombre_persona', 'persona.apellido_paterno','persona.apellido_materno','persona.correo_electronico','empresa.nombre_empresa','persona.correo_electronico','empresa.id_empresa')
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

		public function mostrarCoauditor()
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
					return view('ver_Auditorias_Coa');	
				}
			}
			else
			{
				return redirect('/');
			}	
		}

		public function mostrarBusqueda(Request $datos)
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

					$persona_variable = new persona;
					$busqueda = $persona_variable->txtBuscar = $datos->input ('txtBuscar');

					$listaAuditores = DB::select('select persona.id_persona, persona.nombre_persona, empresa.nombre_empresa, persona.correo_electronico,persona.apellido_paterno, persona.apellido_materno, empresa.id_empresa FROM persona  
						INNER JOIN empresa ON empresa.id_empresa = persona.fk_id_empresa
						WHERE persona.fk_id_tipo =1
						AND (persona.nombre_persona like "%'.$busqueda.'%" OR empresa.nombre_empresa like "%'.$busqueda.'%" OR Persona.correo_electronico like "%'.$busqueda.'%")');
							
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
						\Session::flash('mensaje','Error al añadir el usuario');
						 return redirect('ver_Auditor');
					}
				}
			}
			else
			{
				return redirect('/');
			}
		}

		public function modificar(Request $datos)
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
		            $idPersona=$datos->input('txtidpersona');
       			    $persona=persona::find($idPersona);
				 	$persona->nombre_persona=$datos->input('txtnombreAuditor');
				 	$persona->apellido_paterno=$datos->input('txtapellidoPatAuditor');
				 	$persona->apellido_materno=$datos->input('txtapellidoMatAuditor');
				 	$persona->correo_electronico=$datos->input ('correoAuditor');
				 	/*$persona->contrasena=md5($datos->input('contraAuditor'));*/
				 	$persona->fk_id_empresa=$datos->input('fkEmpresa');
				 	$persona->fk_id_tipo='1';
					if($persona->save()){
						\Session::flash('flash_message', '¡Usuario Modificado con exito');
						return redirect('ver_Auditor');
						
					}
					else 
					{
						\Session::flash('mensaje','Error al modificar el usuario');
						 return redirect('ver_Auditor');
					}	
				}
			}
			else
			{
				return redirect('/');
			}
		}
		
		public function eliminar(Request $datos)
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
					$persona_variable = new persona;
					$id_persona = $persona_variable->txtIdPersona = $datos->input ('txtIdPersona');

					if(DB::delete('DELETE FROM persona  where id_persona=?',[$id_persona]))
					{
						\Session::flash('flash_message', '¡Auditor eliminado con éxito');
						return redirect('ver_Auditor');	
					}
					else 
					{
						\Session::flash('mensaje','Error al eliminar el usuario');
						 return redirect('ver_Auditor');
					}
				}
			}
			else
			{
				return redirect('/');
			}
		}
	}
?>
