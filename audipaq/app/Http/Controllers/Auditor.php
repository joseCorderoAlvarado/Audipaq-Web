<?php
namespace App\Http\Controllers;
use App\Http \Controllers\Controller;
use App\persona;
use App\acta;
use App\doc;
use App\area;
use App\detalle;
use App\departamento;
use App\observaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests\subidaDocumentoRequest;
use DateTime;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

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
					try
					{
						$listaEmpresas = DB::table('empresa')
						->select('id_empresa','nombre_empresa')
						->orderBy('nombre_empresa','ASC')
						->get(); 

						$ConsultaidPersona = DB::table('persona')
						->select('persona.id_persona')
						->where('correo_electronico','=',session('s_identificador'))
						->get();

						$idConversion = json_decode(json_encode($ConsultaidPersona),true);
						$idPersona = implode($idConversion[0]);

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
						->join('persona', 'persona.id_persona', '=', 'acta.fk_id_auditor')
						->join('status', 'status.id_status', '=', 'acta.fk_id_status')
						->join('area', 'area.id_area', '=', 'acta.fk_id_area')
						->join('departamento', 'departamento.id_departamento', '=', 'acta.fk_id_departamento')
						->select('acta.id_acta','acta.fecha_inicio', 'acta.fecha_final','persona.nombre_persona','status.tipo_status','area.nombre_area','departamento.nombre_departamento','status.id_status','area.id_area','departamento.id_departamento')
						->where('persona.id_persona','=',$idPersona)
						->get();
								
						return view('ver_Auditorias',['listaActas'=>$listaActas,'listastatus'=>$listastatus, 'listaArea'=>$listaArea, 'listaDepartamento'=>$listaDepartamento,'listaEmpresas'=>$listaEmpresas]);
					}
					catch (Exception $e) 
			        {
			        	\Session::flash('mensaje','Error al mostrar el listado de actas del auditor, intentelo más tarde');
						return redirect('homePage_Auditor');
			        }	
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
					try
					{
						$listaEmpresas = DB::table('empresa')
						->select('id_empresa','nombre_empresa')
						->orderBy('nombre_empresa','ASC')
						->get(); 

						$ConsultaidPersona = DB::table('persona')
						->select('persona.id_persona')
						->where('correo_electronico','=',session('s_identificador'))
						->get();

						$idConversion = json_decode(json_encode($ConsultaidPersona),true);
						$idPersona = implode($idConversion[0]);

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

						$listaActas = DB::select('select acta.id_acta,acta.fecha_inicio, acta.fecha_final,persona.nombre_persona,status.tipo_status,status.id_status,area.nombre_area,area.id_area,departamento.nombre_departamento,departamento.id_departamento FROM acta INNER JOIN persona ON persona.id_persona=acta.fk_id_auditor INNER JOIN status ON status.id_status=acta.fk_id_status INNER JOIN area ON area.id_area=acta.fk_id_area INNER JOIN departamento ON departamento.id_departamento=acta.fk_id_departamento WHERE persona.id_persona ='.$idPersona.' AND (acta.fecha_inicio like "%'.$busqueda.'%" OR acta.fecha_final like "%'.$busqueda.'%" OR persona.nombre_persona like "%'.$busqueda.'%" OR status.tipo_status like "%'.$busqueda.'%" OR area.nombre_area like "%'.$busqueda.'%" OR departamento.nombre_departamento like "%'.$busqueda.'%")');
								
						return view('ver_Auditorias',['listaActas'=>$listaActas,'listastatus'=>$listastatus, 'listaArea'=>$listaArea, 'listaDepartamento'=>$listaDepartamento,'listaEmpresas'=>$listaEmpresas]);
					}
					catch (Exception $e) 
			        {
			        	\Session::flash('mensaje','Error al mostrar el listado de actas por búsqueda del auditor, intentelo más tarde');
						return redirect('ver_Auditorias');
			        }	
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
					try
					{
						$acta_variable = new acta;
						$id_acta = $acta_variable->txtIdActa = $datos->input ('txtIdActa');

						$listaObservaciones = DB::table('observaciones')
						->join('status', 'observaciones.fk_id_status', '=', 'status.id_status')
						->join('persona', 'observaciones.fk_id_auditor', '=', 'persona.id_persona')
						->join('acta', 'observaciones.fk_id_acta', '=', 'acta.id_acta')
						->join('prioridad', 'observaciones.fk_id_prioridad', '=', 'prioridad.id_prioridad')
						->join('area', 'area.id_area', '=', 'acta.fk_id_area')
						->select('observaciones.id_observaciones','observaciones.comentarios', 'status.tipo_status','status.id_status','persona.nombre_persona','acta.id_acta','acta.fecha_inicio','prioridad.tipo_prioridad','prioridad.id_prioridad','area.nombre_area','area.id_area','area.encargado_area')
						->where('fk_id_acta','=',$id_acta)
						->orderBy('observaciones.fk_id_prioridad','Asc')
						->get();	
							
						$listaPrioridad = DB::table('prioridad')
						->select('id_prioridad','tipo_prioridad')
						->get();	
						
						$listaStatus= DB::table('status')
						->select('id_status','tipo_status')
						->get();
						
						return view('verListadoObservaciones_Auditor',['listaObservaciones'=>$listaObservaciones,'id_acta'=>$id_acta,'listaPrioridad'=>$listaPrioridad, 'listaStatus'=>$listaStatus]);
					}
					catch (Exception $e) 
			        {
			        	\Session::flash('mensaje','Error al mostrar el listado de observaciones del acta, intentelo más tarde');
						return redirect('ver_Auditorias');
			        }	
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
					try
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

					 	$persona = new persona;
					 	$persona->nombre_persona=$datos->input('nombreAuditado');
					 	$persona->apellido_paterno=$datos->input('apellidoPaternoAuditado');
					 	$persona->apellido_materno=$datos->input('apellidoMaternoAuditado');
					 	$persona->correo_electronico=$datos->input ('correoAuditado');

					   //Carácteres para la contraseña
					   $strMay = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
					   $strMin = "abcdefghijklmnopqrstuvwxyz";
					   $strCar = "1234567890";
					   $strNum = "@!#%&.";
					   $passwordMay = "";
					   $passwordMin = "";
					   $passwordCar = "";
					   $passwordNum = "";
					   $password = "";
					   $str = $passwordMay.$passwordMin.$passwordCar.$passwordNum;
					   //Reconstruimos la contraseña segun la longitud que se quiera
					   for($i=0;$i<2;$i++) {
					      //obtenemos un caracter aleatorio escogido de la cadena de caracteres
					      $passwordCar .= substr($strCar,rand(0,62),1);
						}
						for($i=0;$i<3;$i++) {
					      //obtenemos un caracter aleatorio escogido de la cadena de caracteres
					      $passwordMay .= substr($strMay,rand(0,62),1);
						}
						for($i=0;$i<6;$i++) {
					      //obtenemos un caracter aleatorio escogido de la cadena de caracteres
					      $passwordMin .= substr($strMin,rand(0,62),1);
						}
						for($i=0;$i<4;$i++) {
					      //obtenemos un caracter aleatorio escogido de la cadena de caracteres
					      $passwordNum .= substr($strNum,rand(0,62),1);
						}

						for($i=0;$i<15;$i++) {
					      //obtenemos un caracter aleatorio escogido de la cadena de caracteres
					      $password .= substr($str,rand(0,62),1);
						}

					 	$persona->contrasena=md5($password);
					 	$persona->fk_id_empresa=$datos->input('fkEmpresa');
					 	$persona->fk_id_tipo='2';

					 	if($datos->input('nombreArea')=="" || $datos->input('nombreDepartamento')=="")
					 	{
					 		$acta->fk_id_area=$datos->input('txtArea');
					 		$acta->fk_id_departamento=$datos->input('txtDepartamento');	
					 		if($acta->save() && $persona->save()){

								$to = $datos->input ('correoAuditado');
								$subject = "Audipaq - Contraseña de para iniciar sesión como auditado";
								$headers = "MIME-Version: 1.0" . "\r\n";
								$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
								$headers .= "De: atencioncliente@fullboxregalos.com" . "\r\n";
								 
								$message = "
								Tu contraseña generada es: ".$password;
								 
								mail($to, $subject, $message, $headers);


								\Session::flash('flash_message', '¡Nueva acta añadida con éxito');
								return redirect('ver_Auditorias');			
							}
							else {
								\Session::flash('mensaje','Error al añadir el acta');
								 return redirect('ver_Auditorias');
							}
					 	}
					 	else
					 	{
					 		$departamento = new departamento;
					 		$departamento->nombre_departamento= $datos->input('nombreDepartamento');
					 		$departamento->encargado_departamento= $datos->input('encargadoDepartamento');

					 		$area = new area;
					 		$area->nombre_area= $datos->input('nombreArea');
					 		$area->encargado_area= $datos->input('encargadoArea');

					 		if($departamento->save() && $area->save()){
					 			$departamentoAgregado=$departamento->id_departamento;
					 			$areaAgregada=$area->id_area;

					 			$acta->fk_id_area=$areaAgregada;
					 			$acta->fk_id_departamento=$departamentoAgregado;

					 			if($acta->save()  && $persona->save()){
					 				$to = $datos->input ('correoAuditado');
									$subject = "Audipaq - Contraseña de para iniciar sesión como auditado";
									$headers = "MIME-Version: 1.0" . "\r\n";
									$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
									$headers .= "De: atencioncliente@fullboxregalos.com" . "\r\n";
									 
									$message = "
									Tu contraseña generada es: ".$password;
									 
									mail($to, $subject, $message, $headers);


									\Session::flash('flash_message', '¡Nueva acta añadida con éxito');
									return redirect('ver_Auditorias');			
								}
								else {
									\Session::flash('mensaje','Error al añadir el acta');
									 return redirect('ver_Auditorias');
								}
					 		}		
					 	}		
					}
					catch (Exception $e) 
			        {
			        	\Session::flash('mensaje','Error al crear un acta, intentelo más tarde');
						return redirect('ver_Auditorias');
			        }
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
					try
					{
						$ConsultaidPersona = DB::table('persona')
						->select('persona.id_persona')
						->where('correo_electronico','=',session('s_identificador'))
						->get();

						$idConversion = json_decode(json_encode($ConsultaidPersona),true);
						$idPersona = implode($idConversion[0]);

	                    $idActa=$datos->input('txtIdActa');
	       			    $Acta=acta::find($idActa);
					 	$Acta->fecha_final=$datos->input('txtFechaFinal');
					 	$Acta->fk_id_auditor=$idPersona;
					 	$Acta->fk_id_status=$datos->input('txtEstatus');
					 	$Acta->fk_id_area=$datos->input('txtArea');
					 	$Acta->fk_id_departamento=$datos->input('txtDepartamento');
						if($Acta->save()){
							\Session::flash('flash_message', '¡Acta Modificada con exito');
							return redirect('ver_Auditorias');
							
						}
						else 
						{
							\Session::flash('mensaje','Error al modificar el acta');
							 return redirect('ver_Auditorias');
						}	
					}
					catch (Exception $e) 
			        {
			        	\Session::flash('mensaje','Error al modificar el acta, intentelo más tarde');
						return redirect('ver_Auditorias');
			        }
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
			if (session ()->has('s_tipoUsuario'))
			{
				if(session('s_tipoUsuario')=='1')
				{
					try 
					{
         				DB::beginTransaction();
					
						$ConsultaidPersona = DB::table ('persona')
						->select('persona.id_persona')
						->where('correo_electronico','=',session('s_identificador'))
						->get(); 
						
						
						$idConversion = json_decode(json_encode($ConsultaidPersona),true); 
						$idPersona= implode ($idConversion[0]); 

						$observaciones = new observaciones; 
						$observaciones->comentarios=$datos->input('txtObservacion'); 
						$observaciones->fk_id_status=$datos->input('fkStatus'); 
						$observaciones->fk_id_auditor=$idPersona; 
						$observaciones->fk_id_acta=$datos->input('txtIdACta'); 
						$observaciones->fk_id_prioridad=$datos->input('fkPrioridad'); 
						$observaciones->save();
						$observacionAgregada=$observaciones->id_observaciones;

						$consulta_area = DB::table('acta')
						->select('fk_id_area')
						->where('id_acta','=',$datos->input('txtIdACta')) 
						->get();	

						$idConversion = json_decode(json_encode($consulta_area),true); 
						$id_area= implode ($idConversion[0]); 

						foreach ($datos->documentos as $documento) 
						{
				          	$nombreOriginal = $documento->getClientOriginalName();
							$fecha = new DateTime();
							$carpeta="/documentosActas/";
							$nombreCambiado=$carpeta.$fecha->format('Y-m-d_H-i-s')."_".$nombreOriginal;
							Storage::disk('public')->put($nombreCambiado,  File::get($documento));
									
						    $archivo_doc = new doc;
							$archivo_doc->nombre_doc=$nombreOriginal;
							$archivo_doc->evidencia=$nombreCambiado;
							$archivo_doc->save();
							$documentoAgregado=$archivo_doc->id_doc;

							$doc_detalle = new detalle;
							$doc_detalle->fecha=$fecha;
							$doc_detalle->fk_id_area=$id_area;
							$doc_detalle->fk_id_persona=$idPersona;
							$doc_detalle->fk_id_doc=$documentoAgregado; 
							$doc_detalle->fk_id_observaciones=$observacionAgregada; 
							$doc_detalle->save();

		        		}

					 	DB::commit(); 
					 	\Session::flash('flash_message', '¡Nueva observación añadida con éxito');

					 	$acta_variable = new acta;
						$id_acta = $acta_variable->txtIdActa = $datos->input('txtIdACta'); 

						$listaObservaciones = DB::table('observaciones')
						->join('status', 'observaciones.fk_id_status', '=', 'status.id_status')
						->join('persona', 'observaciones.fk_id_auditor', '=', 'persona.id_persona')
						->join('acta', 'observaciones.fk_id_acta', '=', 'acta.id_acta')
						->join('prioridad', 'observaciones.fk_id_prioridad', '=', 'prioridad.id_prioridad')
						->join('area', 'area.id_area', '=', 'acta.fk_id_area')
						->select('observaciones.id_observaciones','observaciones.comentarios', 'status.tipo_status','status.id_status','persona.nombre_persona','acta.id_acta','acta.fecha_inicio','prioridad.tipo_prioridad','prioridad.id_prioridad','area.nombre_area','area.id_area','area.encargado_area')
						->where('fk_id_acta','=',$id_acta)
						->orderBy('observaciones.fk_id_prioridad','Asc')
						->get();	
							
						$listaPrioridad = DB::table('prioridad')
						->select('id_prioridad','tipo_prioridad')
						->get();	
						
						$listaStatus= DB::table('status')
						->select('id_status','tipo_status')
						->get();
					
					
						return view('verListadoObservaciones_Auditor',['listaObservaciones'=>$listaObservaciones,'id_acta'=>$id_acta,'listaPrioridad'=>$listaPrioridad, 'listaStatus'=>$listaStatus]);

			        } 
			        catch (Exception $e) 
			        {
			          	db::rollback();

						\Session::flash('mensaje','Error al añadir la observacion');
						$acta_variable = new acta;
						$id_acta = $acta_variable->txtIdActa = $datos->input('txtIdACta'); 

						$listaObservaciones = DB::table('observaciones')
						->join('status', 'observaciones.fk_id_status', '=', 'status.id_status')
						->join('persona', 'observaciones.fk_id_auditor', '=', 'persona.id_persona')
						->join('acta', 'observaciones.fk_id_acta', '=', 'acta.id_acta')
						->join('prioridad', 'observaciones.fk_id_prioridad', '=', 'prioridad.id_prioridad')
						->join('area', 'area.id_area', '=', 'acta.fk_id_area')
						->select('observaciones.id_observaciones','observaciones.comentarios', 'status.tipo_status','status.id_status','persona.nombre_persona','acta.id_acta','acta.fecha_inicio','prioridad.tipo_prioridad','prioridad.id_prioridad','area.nombre_area','area.id_area','area.encargado_area')
						->where('fk_id_acta','=',$id_acta)
						->orderBy('observaciones.fk_id_prioridad','Asc')
						->get();	
							
						$listaPrioridad = DB::table('prioridad')
						->select('id_prioridad','tipo_prioridad')
						->get();	
						
						$listaStatus= DB::table('status')
						->select('id_status','tipo_status')
						->get();
					
					
						return view('verListadoObservaciones_Auditor',['listaObservaciones'=>$listaObservaciones,'id_acta'=>$id_acta,'listaPrioridad'=>$listaPrioridad, 'listaStatus'=>$listaStatus]);
			        }	
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
					try 
					{
         				DB::beginTransaction(); 

						$ConsultaidPersona = DB::table('persona')
						->select('persona.id_persona')
						->where('correo_electronico','=',session('s_identificador'))
						->get();

						$idConversion = json_decode(json_encode($ConsultaidPersona),true);
						$idPersona = implode($idConversion[0]);

	                    $idObservacion=$datos->input('txtIdObservacion');
	       			    $observaciones=observaciones::find($idObservacion);
						$observaciones->comentarios=$datos->input('txtObservacion'); 
						$observaciones->fk_id_status=$datos->input('fkStatus'); 
						$observaciones->fk_id_auditor=$idPersona; 
						$observaciones->fk_id_acta=$datos->input('txtIdACta'); 
						$observaciones->fk_id_prioridad=$datos->input('fkPrioridad'); 
						$observaciones->save();

						$consulta_area = DB::table('acta')
						->select('fk_id_area')
						->where('id_acta','=',$datos->input('txtIdACta')) 
						->get();	

						$idConversion = json_decode(json_encode($consulta_area),true); 
						$id_area= implode ($idConversion[0]); 

						if ($datos->documentosModificar!=null)
						{
							foreach ($datos->documentosModificar as $docModi)
							{
								$nombreOriginal = $docModi->getClientOriginalName();
								$fecha = new DateTime();
								$carpeta="/documentosActas/";
								$nombreCambiado=$carpeta.$fecha->format('Y-m-d_H-i-s')."_".$nombreOriginal;
								Storage::disk('public')->put($nombreCambiado,  File::get($docModi));

								$id_documento=$datos->id_documentos[0];

								$doc=doc::find($id_documento);
								$doc->nombre_doc=$nombreOriginal;
								$doc->evidencia=$nombreCambiado;
								$doc->save();

								$consulta_detalle=DB::table('detalle')
								->select('id_detalle')
								->where('fk_id_observaciones','=',$datos->input('txtIdObservacion'))
								->get();

								$idDetalle =json_decode(json_encode($consulta_detalle),true); 
								$id_detalle= implode ($idDetalle[0]);
								
								$doc_detalle=detalle::find($id_detalle);
								$doc_detalle->fecha=$fecha; 
								$doc_detalle->fk_id_area=$id_area; 
								$doc_detalle->fk_id_persona=$idPersona; 
								$doc_detalle->fk_id_doc=$id_documento; 
								$doc_detalle->fk_id_observaciones=$idObservacion; 
								$doc_detalle->save(); 
							}
						}

						DB::commit();

						\Session::flash('flash_message', '¡Observación modificada con éxito!');

					 	$acta_variable = new acta;
						$id_acta = $acta_variable->txtIdActa = $datos->input('txtIdACta'); 

						$listaObservaciones = DB::table('observaciones')
						->join('status', 'observaciones.fk_id_status', '=', 'status.id_status')
						->join('persona', 'observaciones.fk_id_auditor', '=', 'persona.id_persona')
						->join('acta', 'observaciones.fk_id_acta', '=', 'acta.id_acta')
						->join('prioridad', 'observaciones.fk_id_prioridad', '=', 'prioridad.id_prioridad')
						->join('area', 'area.id_area', '=', 'acta.fk_id_area')
						->select('observaciones.id_observaciones','observaciones.comentarios', 'status.tipo_status','status.id_status','persona.nombre_persona','acta.id_acta','acta.fecha_inicio','prioridad.tipo_prioridad','prioridad.id_prioridad','area.nombre_area','area.id_area','area.encargado_area')
						->where('fk_id_acta','=',$id_acta)
						->orderBy('observaciones.fk_id_prioridad','Asc')
						->get();	
							
						$listaPrioridad = DB::table('prioridad')
						->select('id_prioridad','tipo_prioridad')
						->get();	
						
						$listaStatus= DB::table('status')
						->select('id_status','tipo_status')
						->get();
					
					
						return view('verListadoObservaciones_Auditor',['listaObservaciones'=>$listaObservaciones,'id_acta'=>$id_acta,'listaPrioridad'=>$listaPrioridad, 'listaStatus'=>$listaStatus]);

			        } 
			        catch (Exception $e) 
			        {
			          	db::rollback();

			          	\Session::flash('mensaje','Error al modificar la observacion');
						$acta_variable = new acta;
						$id_acta = $acta_variable->txtIdActa = $datos->input('txtIdACta'); 

						$listaObservaciones = DB::table('observaciones')
						->join('status', 'observaciones.fk_id_status', '=', 'status.id_status')
						->join('persona', 'observaciones.fk_id_auditor', '=', 'persona.id_persona')
						->join('acta', 'observaciones.fk_id_acta', '=', 'acta.id_acta')
						->join('prioridad', 'observaciones.fk_id_prioridad', '=', 'prioridad.id_prioridad')
						->join('area', 'area.id_area', '=', 'acta.fk_id_area')
						->select('observaciones.id_observaciones','observaciones.comentarios', 'status.tipo_status','status.id_status','persona.nombre_persona','acta.id_acta','acta.fecha_inicio','prioridad.tipo_prioridad','prioridad.id_prioridad','area.nombre_area','area.id_area','area.encargado_area')
						->where('fk_id_acta','=',$id_acta)
						->orderBy('observaciones.fk_id_prioridad','Asc')
						->get();	
							
						$listaPrioridad = DB::table('prioridad')
						->select('id_prioridad','tipo_prioridad')
						->get();	
						
						$listaStatus= DB::table('status')
						->select('id_status','tipo_status')
						->get();
					
					
						return view('verListadoObservaciones_Auditor',['listaObservaciones'=>$listaObservaciones,'id_acta'=>$id_acta,'listaPrioridad'=>$listaPrioridad, 'listaStatus'=>$listaStatus]);
					}
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
