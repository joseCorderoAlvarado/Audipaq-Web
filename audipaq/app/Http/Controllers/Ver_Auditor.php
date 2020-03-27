<?php
namespace App\Http\Controllers;
use App\Http \Controllers\Controller;
use App\persona;
use Illuminate\Http\Request;
use DB;

	class Ver_Auditor extends Controller
	{
		public function index()
		{
			return view ('homePage_Auditor');
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
