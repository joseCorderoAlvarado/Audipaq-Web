@extends('layouts.head')
@include('layouts.menu_Navegacion_Administrador')
@include('modales_MiEmpresa.modal_CrearEmpresa')
@include('modales_MiEmpresa.modal_ModificarEmpresa')
@include('modales_MiEmpresa.modal_EliminarEmpresa')
<br>
<button type="button" class="btn btn-primary" style="background: #00ACC1; border: none; margin-left: 80%" data-toggle="modal" data-target="#crearEmpresa">Nueva Empresa</button>
<br><br><br>
<div style="margin-left: 25%; margin-right: 75%">
	<h4>Empresas</h4>
</div>
<br>
<div style="background-color: white; border: none; padding: 40px 50px; border-radius: 5px; width: 55%; margin-left: auto; margin-right: auto">
	<b>Logotipo</b><br><br>
	<img src="images/audipaq.png" style="width: 100px">
	<br><br><br>
	<b>Nombre</b><br>
	AudiPaq
	<br><br><br>
	<b>Giro</b><br>
	Auditorías
	<br><br><br>
	<b>Misión</b><br>
	xxxxxxxxxxxxx xx xxx x xxxx x xxxxxxxx
	<br><br><br>
	<b>Visión</b><br>
	xxxxxxxxxxxxx xx xxx x xxxx x xxxxxxxx
	<br><br><br>
	<b>Valores</b><br>
	xxxxxx, xxxxxxx, xxxxx, xxxx, xxxxxxxxx, xxxxxxx
	<br><br><br>
	<b>Correro</b><br>
	xxxxxxxxxxx@xxxx.xxxx
	<br><br><br>
	<b>Teléfono</b><br>
	xxxxxxxxxxx
	<br><br><br>
	<b>Dirección</b><br>
	xxxxxxxx #127, xxxxx
	<br><br><br>
	<button type="submit" class="btn btn-primary" style="background: #00ACC1; border: none;" data-toggle="modal" data-target="#modificarEmpresa">Modificar</button>
    <button type="submit" class="btn btn-primary" style="background: #00ACC1; border: none; margin-left: 5%" data-toggle="modal" data-target="#eliminarEmpresa">Eliminar</button>
</div>
<br>
<br>
@extends('layouts.footer')