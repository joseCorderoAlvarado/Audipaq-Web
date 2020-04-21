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
					$listaActas = DB::table('acta')
					->join('persona', 'persona.id_persona', '=', 'acta.fk_id_persona')
					->join('status', 'status.id_status', '=', 'acta.fk_id_status')
					->join('area', 'area.id_area', '=', 'acta.fk_id_area')
					->join('departamento', 'departamento.id_departamento', '=', 'acta.fk_id_departamento')
					->select('acta.id_acta','acta.fecha_inicio', 'acta.fecha_final','persona.nombre_persona','status.tipo_status','area.nombre_area','departamento.nombre_departamento')
					->get();
							
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

		public function mostrarBusqueda(Request $datos)
		{
			if (session()->has('s_tipoUsuario') ) 
			{
				if(session('s_tipoUsuario')=='1')
				{
					$acta_variable = new acta;
					$busqueda = $acta_variable->txtBuscar = $datos->input ('txtBuscar');

					$listaActas = DB::select('select acta.id_acta,acta.fecha_inicio, acta.fecha_final,persona.nombre_persona,status.tipo_status,area.nombre_area,departamento.nombre_departamento FROM acta INNER JOIN persona ON persona.id_persona=acta.fk_id_persona INNER JOIN status ON status.id_status=acta.fk_id_status INNER JOIN area ON area.id_area=acta.fk_id_area INNER JOIN departamento ON departamento.id_departamento=acta.fk_id_departamento WHERE acta.fecha_inicio like "%'.$busqueda.'%" OR acta.fecha_final like "%'.$busqueda.'%" OR persona.nombre_persona like "%'.$busqueda.'%" OR status.tipo_status like "%'.$busqueda.'%" OR area.nombre_area like "%'.$busqueda.'%" OR departamento.nombre_departamento like "%'.$busqueda.'%"');
							
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

		public function observaciones()
		{
			if (session()->has('s_tipoUsuario') ) 
			{
				if(session('s_tipoUsuario')=='1')
				{
					$listaObservaciones = DB::table('observaciones')
					->join('status', 'observaciones.fk_id_status', '=', 'status.id_status')
					->join('persona', 'observaciones.fk_id_auditor', '=', 'persona.id_persona')
					->join('acta', 'observaciones.fk_id_acta', '=', 'acta.id_acta')
					->join('prioridad', 'observaciones.fk_id_prioridad', '=', 'prioridad.id_prioridad')
					->join('area', 'area.id_area', '=', 'acta.fk_id_area')
					->select('observaciones.id_observaciones','observaciones.comentarios', 'status.tipo_status','persona.nombre_persona','acta.id_acta','acta.fecha_inicio','prioridad.tipo_prioridad','area.nombre_area','area.encargado_area')
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
	}
?>
