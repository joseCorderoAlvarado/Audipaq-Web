<?php
namespace App\Http\Controllers;
use App\Http \Controllers\Controller;
use App\persona;
use App\acta;
use App\doc;
use App\area;
use App\detalle;
use App\observaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests\subidaDocumentoRequest;
use DateTime;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

	class Coauditor extends Controller
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
					return view('homePage_Coauditor');
				}
				elseif(session('s_tipoUsuario')=='4')
				{
					return redirect ('homePage_Administrador');
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
					return view('homePage_Auditor');
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
					return redirect ('homePage_Administrador');
				}
			}
			else
			{
				return redirect('/');
			}
		}

		public function observaciones(Request $datos)
		{
			if (session()->has('s_tipoUsuario') ) 
			{
				if(session('s_tipoUsuario')=='1')
				{
					return view('homePage_Auditor');
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
					return redirect ('homePage_Administrador');
				}
			}
			else
			{
				return redirect('/');
			}
		}


		public function crear_Acta(Request $datos)
		{
			if (session()->has('s_tipoUsuario') ) 
			{
				if(session('s_tipoUsuario')=='1')
				{
					return view('homePage_Auditor');
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
					return redirect ('homePage_Administrador');
				}
			}
			else
			{
				return redirect('/');
			}
		}


		public function editar_Acta(Request $datos)
		{
			if (session()->has('s_tipoUsuario') ) 
			{
				if(session('s_tipoUsuario')=='1')
				{
					return view('homePage_Auditor');
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
					return redirect ('homePage_Administrador');
				}
			}
			else
			{
				return redirect('/');
			}
		}
		
		public function crearObservacion(subidaDocumentoRequest $datos)
		{
			if (session()->has('s_tipoUsuario') ) 
			{
				if(session('s_tipoUsuario')=='1')
				{
					return view('homePage_Auditor');
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
					return redirect ('homePage_Administrador');
				}
			}
			else
			{
				return redirect('/');
			}	
		}
		
		public function Editar_Observacion (subidaDocumentoRequest $datos)
		{
			if (session()->has('s_tipoUsuario') ) 
			{
				if(session('s_tipoUsuario')=='1')
				{
					return view('homePage_Auditor');
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
					return redirect ('homePage_Administrador');
				}
			}
			else
			{
				return redirect('/');
			}
			
		}

		public function crear_coauditor(Request $datos)
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
					$persona = new persona;
				 	$persona->nombre_persona=$datos->input('txtnombreCoauditor');
				 	$persona->apellido_paterno=$datos->input('txtapellidoPatCoauditor');
				 	$persona->apellido_materno=$datos->input('txtapellidoMatCoauditor');
				 	$persona->correo_electronico=$datos->input ('correoCoauditor');
				 	$persona->contrasena=md5($datos->input('contraAuditor'));
				 	$persona->fk_id_empresa=$datos->input('fkEmpresa');
				 	$persona->fk_id_tipo='3';
				 	
					if($persona->save()){
					
						\Session::flash('flash_message', '¡Nuevo usuario añadido con éxito');
						return redirect('ver_Auditorias_Coa');
						
					}
					else {
						\Session::flash('mensaje','Error al añadir el usuario');
						 return redirect('ver_Auditorias_Coa');
					}


				}
				elseif(session('s_tipoUsuario')=='4')
				{
					return redirect ('homePage_Administrador');
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
					$listaEmpresas = DB::table('empresa')
					->select('id_empresa','nombre_empresa')
					->orderBy('nombre_empresa','ASC')
					->get(); 

					$listaCoauditores = DB::table('persona')
					->join('empresa', 'empresa.id_empresa', '=', 'persona.fk_id_empresa')
					->select('persona.id_persona','persona.nombre_persona', 'persona.apellido_paterno','persona.apellido_materno','persona.correo_electronico','empresa.nombre_empresa','persona.correo_electronico','empresa.id_empresa')
					->where('persona.fk_id_tipo','=','3')
					->get();
							
					return view('ver_Auditorias_Coa',['listaEmpresas'=>$listaEmpresas,'listaCoauditores'=>$listaCoauditores]);
				}
				elseif(session('s_tipoUsuario')=='4')
				{
					return redirect ('homePage_Administrador');
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
				elseif(session('s_tipoUsuario')=='4')
				{
		            return redirect ('homePage_Administrador');
				}
			}
			else
			{
				return redirect('/');
			}
		}
	}
?>
