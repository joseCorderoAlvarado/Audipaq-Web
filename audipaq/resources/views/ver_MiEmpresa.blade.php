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

	
	<div class="col-12" style="font-size:35px; font-weight: bold;  font-style:italic;">
	<center>{{$empresas->nombre_empresa}} </center>
    </div>

<form class="needs-validation" novalidate>
		  <div class="form-row">
		  	<div class="col-12">
				<center><label><b>Logotipo</b></label><br>		
				<img class="img-rounded" src="../storage/app/public{{$empresas->logotipo}}" width="160em" height="160em">
				</center>			
			</div>
		    <div class="col-md-4 mb-3">
		      <label><b>Nombre</b></label>
		      <input type="text" readonly="readonly" class="form-control" value="{{$empresas->nombre_empresa}}">
		    </div>
		    <div class="col-md-4 mb-3">
		      <label> <b>Giro</b></label>
		      <input type="text" class="form-control" readonly="readonly"  value="{{$empresas->giro}}">
		    </div>

		    <div class="col-md-4 mb-3">
		      <label><b>Correo Electronico</b></label>
		      <div class="input-group">
		        <div class="input-group-prepend">
		          <span class="input-group-text">@</span>
		        </div>
		       <input type="text" class="form-control" readonly="readonly"  value="{{$empresas->correo_electronico}}">
		      </div>
		    </div>

		  </div>
		  <div class="form-row">
		    <div class="col-md-6 mb-3">
		      <label><b>Mision</b></label>
		       <textarea readonly="readonly" class="form-control" > {{$empresas->mision}}
		       </textarea>
		    </div>
		    <div class="col-md-6 mb-3">
		      <label ><b>Vision</b></label>
		       <textarea  class="form-control" readonly="readonly"  >{{$empresas->vision}}
		       </textarea>
		    </div>
		    <div class="col-md-6 mb-3">
		      <label><b>Valores</b></label>
		       <textarea  class="form-control" readonly="readonly"  >{{$empresas->valores}}
		       </textarea>
		      
		    </div>
		    <div class="col-md-3 mb-3">
		      <label ><b>Télefono</b></label>
		      <input type="text" class="form-control" readonly="readonly"  value="{{$empresas->telefono}}">
		    </div>
		     <div class="col-md-3 mb-3">
		      <label ><b>Dirección</b></label>
		      <input type="text" class="form-control" readonly="readonly"  value="{{$empresas->direccion}}">
		    </div>
		  </div>
		</form>
	<input type="hidden" value="{{$empresas->id_empresa}}" id="idEmpresa">
	<br>
	
	<button type="submit" class="btn btn-primary" style="background: #00ACC1; border: none;" data-toggle="modal" data-target="#modificarEmpresa{{$empresas->id_empresa}}">Modificar</button>
    <button type="submit" class="btn btn-primary" style="background: #00ACC1; border: none; margin-left: 5%" data-toggle="modal" data-target="#eliminarEmpresa{{$empresas->id_empresa}}">Eliminar</button>

</div>
@include('modales_MiEmpresa.modal_ModificarEmpresa')
@include('modales_MiEmpresa.modal_EliminarEmpresa')
<br>
@endforeach
<br><br>
<br>
@extends('layouts.footer')

