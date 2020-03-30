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

Route::get('/', function(){return view('index');});
#Route::get('/', function(){return view('welcome');});


//Controlador de Login para mostrar el formulario
Route::Get('login','Login@mostrar');

//Controladores de botones de inicio de sesión dentro de un formulario o de cierre de sesión
Route::post('btnLogin','Login@verificar');
Route::Get('btnLogout','Login@cerrarSesion');


//Controlador de ver Auditor para mostrar la pagina
Route::Get('homePage_Administrador','Administrador@index');
Route::Get('ver_Auditor','Administrador@mostrar');
Route::post('Ver_AuditorGuardar','Ver_Auditor@guardar');
Route::Get('modificar_Auditor','Administrador@modificar');



#Auth::routes();

#Route::get('/home', 'HomeController@index')->name('home');

#Auth::routes();

#Route::get('/home', 'HomeController@index')->name('home');

#Auth::routes();

#Route::get('/home', 'HomeController@index')->name('home');
