<?php
namespace App\Http\Controllers;
use App\Http \Controllers\Controller;
use App\persona;
use App\acta;
use App\doc;
use App\area;
use App\detalle;
use App\observaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests\subidaDocumentoRequest;
use DateTime;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

	class Coauditor extends Controller
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
					return view('homePage_Coauditor');
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

		public function mostrarBusqueda(Request $datos)
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

		public function observaciones(Request $datos)
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


		public function crear_Acta(Request $datos)
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


		public function editar_Acta(Request $datos)
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
		
		public function crearObservacion(subidaDocumentoRequest $datos)
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
		
		public function Editar_Observacion (subidaDocumentoRequest $datos)
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
	}
?>
