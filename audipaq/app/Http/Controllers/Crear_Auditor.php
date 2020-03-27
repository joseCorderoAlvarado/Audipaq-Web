<?php
namespace App\Http\Controllers;
use App\Http \Controllers\Controller;
use App\persona;
use Illuminate\Http\Request;
use DB;

	class Ver_Auditor extends Controller
	{
		public function mostrar()
		{
			return view ('ver_Auditor');
		}
	}
?>
