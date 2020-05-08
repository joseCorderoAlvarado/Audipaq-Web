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
					try
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
					catch (Exception $e) 
			        {
			        	\Session::flash('mensaje','Error al mostrar el listado de auditores, intentelo más tarde');
						return redirect('homePage_Administrador');
			        }		
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
					try
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
					return view('ver_Coauditor',['listaEmpresas'=>$listaEmpresas,'listaCoauditores'=>$listaCoauditores]);	
					}
					catch (Exception $e) 
			        {
			        	\Session::flash('mensaje','Error al mostrar el listado de coauditores, intentelo más tarde');
						return redirect('homePage_Administrador');
			        }
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
					try
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
					catch (Exception $e) 
			        {
			        	\Session::flash('mensaje','Error al cargar la búsqueda, intentelo más tarde');
						return redirect('ver_Auditor');
			        }		
				}
			}
			else
			{
				return redirect('/');
			}	
		}

		public function mostrarCoauditorBusqueda(Request $datos)
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
					try
					{
						$listaEmpresas = DB::table('empresa')
						->select('id_empresa','nombre_empresa')
						->orderBy('nombre_empresa','ASC')
						->get(); 

						$persona_variable = new persona;
						$busqueda = $persona_variable->txtBuscar = $datos->input ('txtBuscar');

						$listaCoauditores = DB::select('select persona.id_persona, persona.nombre_persona, empresa.nombre_empresa, persona.correo_electronico,persona.apellido_paterno, persona.apellido_materno, empresa.id_empresa FROM persona  
							INNER JOIN empresa ON empresa.id_empresa = persona.fk_id_empresa
							WHERE persona.fk_id_tipo =3
							AND (persona.nombre_persona like "%'.$busqueda.'%" OR empresa.nombre_empresa like "%'.$busqueda.'%" OR Persona.correo_electronico like "%'.$busqueda.'%")');
								
						return view('ver_Coauditor',['listaEmpresas'=>$listaEmpresas,'listaCoauditores'=>$listaCoauditores]);
					}
					catch (Exception $e) 
			        {
			        	\Session::flash('mensaje','Error al cargar la búsqueda, intentelo más tarde');
						return redirect('ver_Coauditor');
			        }
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
					try
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
					catch (Exception $e) 
			        {
			        	\Session::flash('mensaje','Error al crear el auditor, intentelo más tarde');
						return redirect('ver_Auditor');
			        }
				}
			}
			else
			{
				return redirect('/');
			}
		}

		public function crearCoauditor(Request $datos)
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
					try
					{
						$persona = new persona;
					 	$persona->nombre_persona=$datos->input('txtnombreCoauditor');
					 	$persona->apellido_paterno=$datos->input('txtapellidoPatCoauditor');
					 	$persona->apellido_materno=$datos->input('txtapellidoMatCoauditor');
					 	$persona->correo_electronico=$datos->input ('correoCoauditor');
					 	$persona->contrasena=md5($datos->input('contraCoauditor'));
					 	$persona->fk_id_empresa=$datos->input('fkEmpresa');
					 	$persona->fk_id_tipo='3';
					 	
						if($persona->save()){
						
							\Session::flash('flash_message', '¡Nuevo usuario añadido con éxito');
							return redirect('ver_Coauditor');
							
						}
						else {
							\Session::flash('mensaje','Error al añadir el usuario');
							 return redirect('ver_Coauditor');
						}
					}
					catch (Exception $e) 
			        {
			        	\Session::flash('mensaje','Error al crear el coauditor, intentelo más tarde');
						return redirect('ver_Coauditor');
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
					try
					{
						$idPersona=$datos->input('txtidpersona');
	       			    $persona=persona::find($idPersona);
					 	$persona->nombre_persona=$datos->input('txtnombreAuditor');
					 	$persona->apellido_paterno=$datos->input('txtapellidoPatAuditor');
					 	$persona->apellido_materno=$datos->input('txtapellidoMatAuditor');
					 	$persona->correo_electronico=$datos->input ('correoAuditor');
					 	$persona->fk_id_empresa=$datos->input('fkEmpresa');
					 	$persona->fk_id_tipo='1';

						if($persona->save()){
							\Session::flash('flash_message', '¡Auditor Modificado con exito');
							return redirect('ver_Auditor');
							
						}
						else 
						{
							\Session::flash('mensaje','Error al modificar el auditor');
							 return redirect('ver_Auditor');
						}
					}
					catch (Exception $e) 
			        {
			        	\Session::flash('mensaje','Error al intentar modificar los datos del auditor, intentelo más tarde');
						return redirect('ver_Auditor');
			        }	
				}
			}
			else
			{
				return redirect('/');
			}
		}

		public function modificarContra(Request $datos)
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
					try {
						if($datos->input('contraAuditor1')!="" && $datos->input('contraAuditor1')!="")
						{
							if($datos->input('contraAuditor1')==$datos->input('contraAuditor2'))
							{
								$idPersona=$datos->input('txtidpersona');
       			    			$persona=persona::find($idPersona);

								$persona->contrasena=md5($datos->input('contraAuditor1'));
								if($persona->save())
								{
									\Session::flash('flash_message', 'Contraseña modificada con éxito');
									return redirect('ver_Auditor');
									
								}
								else 
								{
									\Session::flash('mensaje','Error al modificar la contraseña, intentelo más tarde');
									 return redirect('ver_Auditor');
								}	
							}
							else
							{
								\Session::flash('mensaje','Las contraseñas no coinciden');
							 	return redirect('ver_Auditor');	
							}
						}
						else
						{
							\Session::flash('flash_message', 'Campos no llenados correctamente');
							return redirect('ver_Auditor');
						}
					}
					catch (Exception $e) 
			        {
			        	\Session::flash('mensaje','Error al modificar la contraseña, intentelo más tarde');
									 return redirect('ver_Auditor');
			        }
				}
			}
			else
			{
				return redirect('/');
			}
		}

		public function modificarCoauditor(Request $datos)
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
					try
					{
						 $idPersona=$datos->input('txtidpersona');
	       			    $persona=persona::find($idPersona);
					 	$persona->nombre_persona=$datos->input('txtnombreCoauditor');
					 	$persona->apellido_paterno=$datos->input('txtapellidoPatCoauditor');
					 	$persona->apellido_materno=$datos->input('txtapellidoMatCoauditor');
					 	$persona->correo_electronico=$datos->input ('correoCoauditor');
					 	$persona->fk_id_empresa=$datos->input('fkEmpresa');
					 	$persona->fk_id_tipo='3';
						if($persona->save()){
							\Session::flash('flash_message', '¡Usuario Modificado con exito');
							return redirect('ver_Coauditor');
							
						}
						else 
						{
							\Session::flash('mensaje','Error al modificar el usuario');
							 return redirect('ver_Coauditor');
						}	
					}
					catch (Exception $e) 
			        {
			        	\Session::flash('mensaje','Error al intentar modificar los datos del coauditor, intentelo más tarde');
						return redirect('ver_Coauditor');
			        }	
				}
			}
			else
			{
				return redirect('/');
			}
		}
		
		public function modificarContraCoa(Request $datos)
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
					try {
						if($datos->input('contraCoauditor1')!="" && $datos->input('contraCoauditor1')!="")
						{
							if($datos->input('contraCoauditor1')==$datos->input('contraCoauditor2'))
							{
								$idPersona=$datos->input('txtidpersona');
       			    			$persona=persona::find($idPersona);

								$persona->contrasena=md5($datos->input('contraCoauditor1'));
								if($persona->save())
								{
									\Session::flash('flash_message', 'Contraseña modificada con éxito');
									return redirect('ver_Coauditor');
									
								}
								else 
								{
									\Session::flash('mensaje','Error al modificar la contraseña, intentelo más tarde');
									 return redirect('ver_Coauditor');
								}	
							}
							else
							{
								\Session::flash('mensaje','Las contraseñas no coinciden');
							 	return redirect('ver_Coauditor');	
							}
						}
						else
						{
							\Session::flash('flash_message', 'Campos no llenados correctamente');
							return redirect('ver_Coauditor');
						}
					}
					catch (Exception $e) 
			        {
			        	\Session::flash('mensaje','Error al modificar la contraseña, intentelo más tarde');
									 return redirect('ver_Coauditor');
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

		public function eliminarCoauditor(Request $datos)
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
						\Session::flash('flash_message', '¡Coauditor eliminado con éxito');
						return redirect('ver_Coauditor');	
					}
					else 
					{
						\Session::flash('mensaje','Error al eliminar el usuario');
						 return redirect('ver_Coauditor');
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
