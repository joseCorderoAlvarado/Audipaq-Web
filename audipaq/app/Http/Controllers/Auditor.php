<?php
namespace App\Http\Controllers;
use App\Http \Controllers\Controller;
use App\persona;
use App\acta;
use App\observaciones;
use Illuminate\Http\Request;
use DB;

	class Auditor extends Controller
	{
		public function index()
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


		public function mostrar()
		{
			if (session()->has('s_tipoUsuario') ) 
			{
				if(session('s_tipoUsuario')=='1')
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

		public function mostrarBusqueda(Request $datos)
		{
			if (session()->has('s_tipoUsuario') ) 
			{
				if(session('s_tipoUsuario')=='1')
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

					$acta_variable = new acta;
					$busqueda = $acta_variable->txtBuscar = $datos->input ('txtBuscar');

					$listaActas = DB::select('select acta.id_acta,acta.fecha_inicio, acta.fecha_final,persona.nombre_persona,status.tipo_status,status.id_status,area.nombre_area,area.id_area,departamento.nombre_departamento,departamento.id_departamento FROM acta INNER JOIN persona ON persona.id_persona=acta.fk_id_persona INNER JOIN status ON status.id_status=acta.fk_id_status INNER JOIN area ON area.id_area=acta.fk_id_area INNER JOIN departamento ON departamento.id_departamento=acta.fk_id_departamento WHERE acta.fecha_inicio like "%'.$busqueda.'%" OR acta.fecha_final like "%'.$busqueda.'%" OR persona.nombre_persona like "%'.$busqueda.'%" OR status.tipo_status like "%'.$busqueda.'%" OR area.nombre_area like "%'.$busqueda.'%" OR departamento.nombre_departamento like "%'.$busqueda.'%"');
							
					return view('ver_Auditorias',['listaActas'=>$listaActas,'listastatus'=>$listastatus, 'listaArea'=>$listaArea, 'listaDepartamento'=>$listaDepartamento]);
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
					$acta_variable = new acta;
					$id_acta = $acta_variable->txtIdActa = $datos->input ('txtIdActa');

					$listaObservaciones = DB::table('observaciones')
					->join('status', 'observaciones.fk_id_status', '=', 'status.id_status')
					->join('persona', 'observaciones.fk_id_auditor', '=', 'persona.id_persona')
					->join('acta', 'observaciones.fk_id_acta', '=', 'acta.id_acta')
					->join('prioridad', 'observaciones.fk_id_prioridad', '=', 'prioridad.id_prioridad')
					->join('area', 'area.id_area', '=', 'acta.fk_id_area')
					->select('observaciones.id_observaciones','observaciones.comentarios', 'status.tipo_status','persona.nombre_persona','acta.id_acta','acta.fecha_inicio','prioridad.tipo_prioridad','area.nombre_area','area.encargado_area')
					->where('fk_id_acta','=',$id_acta)
					->orderBy('observaciones.id_observaciones','Desc')
					->get();		
					return view('verListadoObservaciones_Auditor',['listaObservaciones'=>$listaObservaciones]);
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
					$ConsultaidPersona = DB::table('persona')
					->select('persona.id_persona')
					->where('correo_electronico','=',session('s_identificador'))
					->get();

					$idConversion = json_decode(json_encode($ConsultaidPersona),true);
					$idPersona = implode($idConversion[0]);

					$acta = new acta;
				 	$acta->fecha_inicio=$datos->input('txtFechaInicio');
				 	$acta->fecha_final=$datos->input('txtFechaFinal');
				 	$acta->fk_id_persona=$idPersona;
				 	$acta->fk_id_auditor=$idPersona;
				 	$acta->fk_id_status=$datos->input('txtEstatus');
				 	$acta->fk_id_area=$datos->input('txtArea');
				 	$acta->fk_id_departamento=$datos->input('txtDepartamento');	
					if($acta->save()){
					
						\Session::flash('flash_message', '¡Nueva acta añadida con éxito');
						return redirect('ver_Auditorias');			
					}
					else {
						\Session::flash('mensaje','Error al añadir el acta');
						 return redirect('ver_Auditorias');
					}
							
					return view('ver_Auditorias',['listaActas'=>$listaActas]);
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


		public function modificar(Request $datos)
		{
			if (session()->has('s_tipoUsuario') ) 
			{
				if(session('s_tipoUsuario')=='1')
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
                    
							
					return view('ver_Auditorias',['listaActas'=>$listaActas]);
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
	}
?>
