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

	class Auditado extends Controller
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
					return view('homePage_Auditado');
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
					 $listastatus = DB::table('status')
					->select('id_status','tipo_status')
					->orderBy('tipo_status','ASC')
					->get(); 

					$listaArea = DB::table('area')
					->select('id_area','nombre_area')
					->orderBy('nombre_area','ASC')
					->get();

					$listaDepartamento = DB::table('departamento')
					->select('id_departamento','nombre_departamento')
					->orderBy('nombre_departamento','ASC')
					->get();

					$listaActas = DB::table('acta')
					->join('persona', 'persona.id_persona', '=', 'acta.fk_id_persona')
					->join('status', 'status.id_status', '=', 'acta.fk_id_status')
					->join('area', 'area.id_area', '=', 'acta.fk_id_area')
					->join('departamento', 'departamento.id_departamento', '=', 'acta.fk_id_departamento')
					->select('acta.id_acta','acta.fecha_inicio', 'acta.fecha_final','persona.nombre_persona','status.tipo_status','area.nombre_area','departamento.nombre_departamento','status.id_status','area.id_area','departamento.id_departamento')
					->get();
							
					return view('ver_Auditorias',['listaActas'=>$listaActas,'listastatus'=>$listastatus, 'listaArea'=>$listaArea, 'listaDepartamento'=>$listaDepartamento]);
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
