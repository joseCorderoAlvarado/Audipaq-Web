<?php
namespace App\Http\Controllers;
use App\Http \Controllers\Controller;
use App\persona;
use Illuminate\Http\Request;
use DB;

	class Login extends Controller
	{
		public function mostrar()
		{
			if (session()->has('s_tipoUsuario') ) 
			{
				return redirect ('/');
			}
			else
			{
				return view ('login');
			}
		}


		public function verificar (Request $datos)
		{
			$persona_variable = new persona;
			$correo_Electronico = $persona_variable->txtCorreoElectronico = $datos->input ('txtCorreoElectronico');
			$contrasena = $persona_variable->txtContrasena = $datos->input ('txtContrasena');

			//Creamos una varible usuario que se iguala a la tabla persona
			//se hace una consulta donde se consultan los campos correo electrónico de la tabla persona y la contraseña
			//se hace la condición del where donde se consultan solo aquellos que posean los datos del correo y contraseña ingresados por el usuario.
			//$users = DB::table('users')->select('name', 'email as user_email')->get();
			
			$consultaDatosUsuario = DB::table('persona')
		    ->select('correo_electronico', 'contrasena')
		    ->where('correo_electronico', '=', $correo_Electronico)
		    ->where('contrasena', '=', $contrasena)
		    ->get();


		    if ($consultaDatosUsuario!="[]")
			{
				//buscar esos datos en la base de datos
				$consultaTipoUsuario = DB::table('persona')
			    ->select('fk_id_tipo')
			    ->where('correo_electronico', '=', $correo_Electronico)
				->where('contrasena', '=', $contrasena)
			    ->get();

			    if(strpos($consultaTipoUsuario, '1') == true)
			    {
				    session(['s_tipoUsuario' => '1']);
            		session(['s_identificador'=>$correo_Electronico]);
			       	return redirect('homePage_Auditor');
			   	}
			   	elseif  (strpos($consultaTipoUsuario, '2') == true){
				    session(['s_tipoUsuario' => '2']);
            		session(['s_identificador'=>$correo_Electronico]);
			       	return redirect('homePage_Auditado');
			   	}
			   	elseif  (strpos($consultaTipoUsuario, '3') == true){
				    session(['s_tipoUsuario' => '3']);
            		session(['s_identificador'=>$correo_Electronico]);
			       	return redirect('homePage_Coauditor');
			   	}
			   	elseif  (strpos($consultaTipoUsuario, '4') == true){
				    session(['s_tipoUsuario' => '4']);
            		session(['s_identificador'=>$correo_Electronico]);
			       	return redirect('homePage_Administrador');
			   	}
			}
			else
			{
				return redirect('login');
			}			
		}

		public function cerrarSesion (Request $datos)
		{
			//Matamos todos los datos de la sesion
			Session()->flush();
			return redirect('/');
		}
	}
?>
