<?php
namespace App\Http\Controllers; 
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests\subidaLogotipoRequest;
use DateTime;
use App\empresa;
use DB; 

	class EmpresaController extends Controller 
	{
		public function index ()
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
		
		public function mostrar ()
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
					->select('id_empresa','nombre_empresa','logotipo','giro','mision','vision','valores','direccion','telefono','correo_electronico')
					->orderBy('nombre_empresa','ASC')
					->get(); 
							
					return view('ver_MiEmpresa',['listaEmpresas'=>$listaEmpresas]);
				}
			}
			else
			{
				return redirect('/');
			}
		}
		
		public function crearEmpresa (subidaLogotipoRequest $datos)
		{
			if (session()->has('s_tipoUsuario'))
			{
				if(session('s_tipoUsuario')=='1')
				{
					return redirect ('homePage_Auditor');
				}
				elseif(session('s_tipoUsuario')=='2')
				{
					return redirect ('homePage_Auditado');
				}
				elseif(session('s_tipoUsuario')=='3')
				{
					return redirect ('homePage_Coauditor');
				}
				elseif(session('s_tipoUsuario')=='4')
				{
					$empresa = new empresa;
					$empresa->nombre_empresa=$datos->input('nombreEmpresa');

					foreach($datos->logotipo as $logotipo)
					{
						$nombreOriginal=$logotipo->getClientOriginalName();
						$fecha=new DateTime(); 
						$carpeta="/logotiposEmpresa/";
						$nombreCambiado=$carpeta.$fecha->format('Y-m-d_H-i-s')."_".$nombreOriginal; 
						Storage::disk('public')->put($nombreCambiado,File::get($logotipo)); 
					}

					$empresa->logotipo=$nombreCambiado;
					$empresa->giro=$datos->input('giroEmpresa');
					$empresa->mision=$datos->input('misionEmpresa');
					$empresa->vision=$datos->input('visionEmpresa'); 
					$empresa->valores=$datos->input('valoresEmpresa');
					$empresa->direccion=$datos->input('direccionEmpresa');
					$empresa->telefono=$datos->input('telefonoEmpresa');
					$empresa->correo_electronico=$datos->input('correoEmpresa');

					if($empresa->save())
					{
						\Session::flash('flash_message', '¡Empresa creada con éxito');

						$listaEmpresas = DB::table('empresa')
						->select('id_empresa','nombre_empresa','logotipo','giro','mision','vision','valores','direccion','telefono','correo_electronico')
						->orderBy('nombre_empresa','ASC')
						->get(); 
							
						return view('ver_MiEmpresa',['listaEmpresas'=>$listaEmpresas]);
					}
					else 
					{
						\Session::flash('mensaje','Error al modificar el usuario');
						$listaEmpresas = DB::table('empresa')
						->select('id_empresa','nombre_empresa','logotipo','giro','mision','vision','valores','direccion','telefono','correo_electronico')
						->orderBy('nombre_empresa','ASC')
						->get(); 
							
						return view('ver_MiEmpresa',['listaEmpresas'=>$listaEmpresas]);
					}
				}
			}
		}
		
		public function modificarEmpresa (subidaLogotipoRequest $datos)
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
         				 DB::beginTransaction();

						$idEmpresa=$datos->input('txtIdEmpresa'); 
						$empresa=empresa::find($idEmpresa); 
						
						if ($datos->logotipo!=null)
						{
							foreach($datos->logotipo as $logotipo)
							{
								$nombreOriginal=$logotipo->getClientOriginalName();
								$fecha=new DateTime(); 
								$carpeta="/logotiposEmpresa/";
								$nombreCambiado=$carpeta.$fecha->format('Y-m-d_H-i-s')."_".$nombreOriginal; 
								Storage::disk('public')->put($nombreCambiado,File::get($logotipo)); 
							}
							$empresa->logotipo=$nombreCambiado;
							$empresa->save();
						}

						$empresa2=empresa::find($idEmpresa); 
						$empresa2->nombre_empresa=$datos->input('nombreEmpresa');
						$empresa2->giro=$datos->input('giroEmpresa');
						$empresa2->mision=$datos->input('misionEmpresa');
						$empresa2->vision=$datos->input('visionEmpresa'); 
						$empresa2->valores=$datos->input('valoresEmpresa');
						$empresa2->direccion=$datos->input('direccionEmpresa');
						$empresa2->telefono=$datos->input('telefonoEmpresa');
						$empresa2->correo_electronico=$datos->input('correoEmpresa');
						$empresa2->save();

						DB::commit(); 

						\Session::flash('flash_message', '¡Empresa modificada con éxito');
						$listaEmpresas = DB::table('empresa')
						->select('id_empresa','nombre_empresa','logotipo','giro','mision','vision','valores','direccion','telefono','correo_electronico')
						->orderBy('nombre_empresa','ASC')
						->get(); 
							
						return view('ver_MiEmpresa',['listaEmpresas'=>$listaEmpresas]);
					
			        } 
			        catch (Exception $e) 
			        {
			          	db::rollback();
						\Session::flash('mensaje','Error al modificar la empresa');
						$listaEmpresas = DB::table('empresa')
						->select('id_empresa','nombre_empresa','logotipo','giro','mision','vision','valores','direccion','telefono','correo_electronico')
						->orderBy('nombre_empresa','ASC')
						->get(); 
							
						return view('ver_MiEmpresa',['listaEmpresas'=>$listaEmpresas]);
					}
				}
			}
			
		}
		
		public function eliminarEmpresa(Request $datos)
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
					$variablEmpresa = new empresa; 
					$idEmpresa=$variablEmpresa->txtIdEmpresa=$datos->input('txtIdEmpresa'); 
					if(DB::delete('DELETE FROM empresa where id_empresa=?',[$idEmpresa]))
					{
						\Session::flash('flash_message', '¡Empresa eliminada con éxito');
						$listaEmpresas = DB::table('empresa')
						->select('id_empresa','nombre_empresa','logotipo','giro','mision','vision','valores','direccion','telefono','correo_electronico')
						->orderBy('nombre_empresa','ASC')
						->get(); 
							
						return view('ver_MiEmpresa',['listaEmpresas'=>$listaEmpresas]);
					}
					else 
					{
						\Session::flash('mensaje','Error al eliminar la empresa');
						$listaEmpresas = DB::table('empresa')
						->select('id_empresa','nombre_empresa','logotipo','giro','mision','vision','valores','direccion','telefono','correo_electronico')
						->orderBy('nombre_empresa','ASC')
						->get(); 
							
						return view('ver_MiEmpresa',['listaEmpresas'=>$listaEmpresas]);
					}
				}
			}
		}
	}
?>