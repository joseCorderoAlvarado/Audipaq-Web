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
Route::post('btnCrear_Auditor','Administrador@crear');
Route::post('btnModificar_Auditor','Administrador@modificar');
Route::post('btnEliminar_Auditor','Administrador@eliminar');

//Controladores de Auditor para mostrar la pagina
Route::Get('homePage_Auditor','Auditor@index');
Route::Get('ver_Auditorias','Auditor@mostrar');

#Auth::routes();

#Route::get('/home', 'HomeController@index')->name('home');

#Auth::routes();

#Route::get('/home', 'HomeController@index')->name('home');

#Auth::routes();

#Route::get('/home', 'HomeController@index')->name('home');
