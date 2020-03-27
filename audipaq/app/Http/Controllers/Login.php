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
			return view ('login');
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

			    //session(['s_tipoUsuario' => '3']);
	            session(['s_identificador'=>$correo_Electronico]);
				return redirect('/');
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
