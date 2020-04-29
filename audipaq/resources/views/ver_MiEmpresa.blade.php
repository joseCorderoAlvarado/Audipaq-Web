@extends('layouts.head')
@include('layouts.menu_Navegacion_Administrador')
@include('modales_MiEmpresa.modal_CrearEmpresa')
<br>
<button type="button" class="btn btn-primary" style="background: #00ACC1; border: none; margin-left: 80%" data-toggle="modal" data-target="#crearEmpresa">Nueva Empresa</button>
<br><br><br>
<div style="margin-left: 25%; margin-right: 75%">
	<h4>Empresas</h4>
</div>
	@if(Session::has('flash_message'))
		<div class="alert alert-success" role="alert">
			{{ Session::get('flash_message') }}
		</div>
	@elseif(Session::has('mensaje'))
		<div class="alert alert-danger" role="alert">
			{{ Session::get('mensaje') }}
		</div>
	@endif
<br>
@foreach($listaEmpresas as $empresas)

<div style="background-color: white; border: none; padding: 40px 50px; border-radius: 5px; width: 55%; margin-left: auto; margin-right: auto">
	<input type="hidden" value="{{$empresas->id_empresa}}" id="idEmpresa">
	<br><br>
	<b>Logotipo</b><br><br>
	<img src="{{$empresas->logotipo}}" style="width: 100px">
	<br><br><br>
	<b>Nombre</b><br>
	{{$empresas->nombre_empresa}}
	<br><br><br>
	<b>Giro</b><br>
	{{$empresas->giro}}
	<br><br><br>
	<b>Misión</b><br>
	{{$empresas->mision}}
	<br><br><br>
	<b>Visión</b><br>
	{{$empresas->vision}}
	<br><br><br>
	<b>Valores</b><br>
	{{$empresas->valores}}
	<br><br><br>
	<b>Correro</b><br>
	{{$empresas->correo_electronico}}
	<br><br><br>
	<b>Teléfono</b><br>
	{{$empresas->telefono}}
	<br><br><br>
	<b>Dirección</b><br>
	{{$empresas->direccion}}
	<br><br><br>
	<button type="submit" class="btn btn-primary" style="background: #00ACC1; border: none;" data-toggle="modal" data-target="#modificarEmpresa{{$empresas->id_empresa}}">Modificar</button>
    <button type="submit" class="btn btn-primary" style="background: #00ACC1; border: none; margin-left: 5%" data-toggle="modal" data-target="#eliminarEmpresa{{$empresas->id_empresa}}">Eliminar</button>
</div>
@include('modales_MiEmpresa.modal_ModificarEmpresa')
@include('modales_MiEmpresa.modal_EliminarEmpresa')
@endforeach
<br><br>
<br>
@extends('layouts.footer')