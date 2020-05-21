<?php

namespace App\Http\Controllers;
use App\persona; 
use Illuminate\Http\Request;
use DB; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//require_once 'vendor/autoload.php';

class PhpmailerController extends Controller
{
    public function index()
	{
		return view('template');
	}
	
	
	public function sendEmail (Request $datos)
	{
		$to = $datos->input ('txtCorreoElectronico');
								$subject = "Audipaq - Recuperación de contraseña";
								$headers = "MIME-Version: 1.0" . "\r\n";
								$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
								$headers .= "De: atencioncliente@fullboxregalos.com" . "\r\n";
								 
								$message = "
								Tu contraseña generada es: ".$password;
								 
								mail($to, $subject, $message, $headers)
		
		
	}
	
	public function resContrasena (Request $datos)
	{
		$correoElectronico= $datos ->input('txtCorreoElectronico'); 
		$ConsultaIdPersona = DB::table('persona')
				->select('persona.id_persona')
				->where('correo_electronico', '=', $correoElectronico); 
				>get(); 
			
			$idConversion = json_decode(json_encode($ConsultaIdPersona),true);
			$IdPersona = implode($idConversion[0]);
			
			
		try {
						if($datos->input('txtContrasenaNueva')!="" && $datos->input('txtContrasenaNueva')!="")
						{
							if($datos->input('txtContrasenaNueva')==$datos->input('txtContrasenaConfirmada'))
							{
								//$idPersona=$datos->input('txtidpersona');
       			    			$persona=persona::find($idPersona);

								$persona->contrasena=md5($datos->input('txtContrasenaNueva'));
								if($persona->save())
								{
									\Session::flash('flash_message', 'Contraseña modificada con éxito');
									return view('home');
									
								}
								else 
								{
									\Session::flash('mensaje','Error al modificar la contraseña, intentelo más tarde');
									 return redirect('home');
								}	
							}
							else
							{
								\Session::flash('mensaje','Las contraseñas no coinciden');
							 	return redirect('home');	
							}
						}
						else
						{
							\Session::flash('flash_message', 'Campos no llenados correctamente');
							return redirect('home');
						}
					}
					catch (Exception $e) 
			        {
			        	\Session::flash('mensaje','Error al modificar la contraseña, intentelo más tarde');
									 return redirect('home');
			        }
	}
}
