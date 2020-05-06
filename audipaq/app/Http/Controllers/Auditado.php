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
					$ConsultaidPersona = DB::table('persona')
					->select('persona.id_persona')
					->where('correo_electronico','=',session('s_identificador'))
					->get();

					$idConversion = json_decode(json_encode($ConsultaidPersona),true);
					$idPersona = implode($idConversion[0]);

					$listaObservaciones = DB::table('observaciones')
					->join('status', 'observaciones.fk_id_status', '=', 'status.id_status')
					->join('persona', 'observaciones.fk_id_auditor', '=', 'persona.id_persona')
					->join('detalle', 'observaciones.id_observaciones', '=', 'detalle.fk_id_observaciones')
					->join('prioridad', 'observaciones.fk_id_prioridad', '=', 'prioridad.id_prioridad')
					->join('doc', 'detalle.fk_id_doc', '=', 'doc.id_doc')
					->select('observaciones.id_observaciones','observaciones.comentarios', 'status.tipo_status','status.id_status','persona.nombre_persona','prioridad.tipo_prioridad','prioridad.id_prioridad','detalle.fecha', 'doc.nombre_doc')
					->where('detalle.fk_id_persona','=',$idPersona)
					->orderBy('observaciones.fk_id_prioridad','Asc')
					->get();	
						
					$listaPrioridad = DB::table('prioridad')
					->select('id_prioridad','tipo_prioridad')
					->get();	
					
					$listaStatus= DB::table('status')
					->select('id_status','tipo_status')
					->get();
					return view('homePage_Auditado',['listaObservaciones'=>$listaObservaciones,'listaPrioridad'=>$listaPrioridad, 'listaStatus'=>$listaStatus]);
					//return redirect('homePage_Auditado');
				}
				elseif(session('s_tipoUsuario')=='3')
				{
					
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
