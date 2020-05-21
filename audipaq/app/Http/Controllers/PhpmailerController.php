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
}
