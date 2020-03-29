<?php
namespace App\Http\Controllers;
use App\Http \Controllers\Controller;
use App\persona;
use Illuminate\Http\Request;
use DB;

	class Administrador extends Controller
	{
		public function index()
		{
			return view ('homePage_Administrador');
		}
		public function mostrar()
		{
			return view ('ver_Auditor');
		}

		public function crear()
		{
			return view ('crear_Auditor');
		}

		public function modificar()
		{
			return view ('modificar_Auditor');
		}
	}
?>
