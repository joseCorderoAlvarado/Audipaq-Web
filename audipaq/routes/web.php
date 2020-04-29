<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function()
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
			return redirect('homePage_Administrador');
		}
	}
	else
	{
		return view('index');
	}
});
#Route::get('/', function(){return view('welcome');});


//Controlador de Login para mostrar el formulario
Route::Get('login','Login@mostrar');

//Controladores de botones de inicio de sesión dentro de un formulario o de cierre de sesión
Route::post('btnLogin','Login@verificar');
Route::Get('btnLogout','Login@cerrarSesion');


//Controladores de Administrador para mostrar la pagina
Route::Get('homePage_Administrador','Administrador@index');
Route::Get('ver_Auditor','Administrador@mostrar');
Route::post('ver_Auditor','Administrador@mostrarBusqueda');
Route::post('btnCrear_Auditor','Administrador@crear');
Route::post('btnModificar_Auditor','Administrador@modificar');
Route::post('btnEliminar_Auditor','Administrador@eliminar');

//Controladores de Auditor para mostrar la pagina
Route::Get('homePage_Auditor','Auditor@index');
Route::Get('ver_Auditorias','Auditor@mostrar');
Route::post('ver_Auditorias','Auditor@mostrarBusqueda');
Route::post('verListadoObservaciones_Auditor','Auditor@observaciones');
Route::post('btnCrear_Acta','Auditor@crear_Acta');
Route::post('btnEditar_Acta','Auditor@editar_Acta');
Route::post('btnCrear_Observacion', 'Auditor@crearObservacion');
Route::post('btnEditar_Observacion', 'Auditor@Editar_Observacion');


//Controladores de Coauditor para mostrar la pagina
Route::Get('homePage_Coauditor','Coauditor@index');
Route::Get('ver_Auditorias_Coa','Coauditor@mostrar');
Route::post('ver_Auditorias_Coa','Coauditor@mostrarBusqueda');
Route::post('verListadoObservaciones_Coauditor','Coauditor@observaciones');
Route::post('btnCrear_Acta_Coa','Coauditor@crear_Acta');
Route::post('btnEditar_Acta_Coa','Coauditor@editar_Acta');
Route::post('btnCrear_Observacion_Coa', 'Coauditor@crearObservacion');
Route::post('btnEditar_Observacion_Coa', 'Coauditor@Editar_Observacion');
Route::post('btnCrear_Coauditor','Coauditor@crear_coauditor');
Route::post('btnModificar_Coauditor','Coauditor@modificar');

//Controladores de MiEmpresa para mostrar la página. 
//Route::Get('homePage_Administrador','MiEmpresa@index'); 
Route::Get('ver_MiEmpresa','EmpresaController@mostrar');
Route::post('btnCrearEmpresa', 'EmpresaController@crearEmpresa'); 
Route::post('btnModificarEmpresa', 'EmpresaController@modificarEmpresa');
Route::post('btnEliminarEmpresa', 'EmpresaController@eliminarEmpresa');

#Auth::routes();

#Route::get('/home', 'HomeController@index')->name('home');

#Auth::routes();

#Route::get('/home', 'HomeController@index')->name('home');

#Auth::routes();

#Route::get('/home', 'HomeController@index')->name('home');
