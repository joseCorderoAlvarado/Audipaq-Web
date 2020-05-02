@extends('layouts.head')
@include('layouts.menu_Navegacion_Administrador_VerCoauditor')
@include('modales_Administrador.modal_CrearCoauditor')

<br>
<div class="row" style="margin-left: 80%;">
	<button type="button" class="btn btn-primary" style="background: #00ACC1; border: none;"data-toggle="modal" data-target="#crearCoauditor">Crear Coauditor</button>
</div>
<br>
<div class="container-fluid center-block" style="margin: center; text-align: center; justify-content: center;">
	<div class="container-fluid" style="border-radius: 3px; padding: 10px; ">
			@if(Session::has('flash_message'))
				<div class="alert alert-success" role="alert">
					{{ Session::get('flash_message') }}
				</div>
			@elseif(Session::has('mensaje'))
				<div class="alert alert-danger" role="alert">
					{{ Session::get('mensaje') }}
				</div>
			@endif
		<div class="row">
			<div class="col-0" style="background-color: white; margin-left:15%; padding: 1%; margin-top: 1%;">
		        <h5 style="text-align:center;">&nbsp;&nbsp;</h5>
			</div>
		    <div class="col-1" style="background-color: white; padding: 1%; margin-top: 1%;">
		        <h5 style="text-align:center;">ID</h5>
			</div>
		    <div class="col-2" style="background-color: white; margin-left:20px; padding: 1%; margin-top: 1%;">
		    	<h5 style="text-align:center;">Nombre</h5>
		    </div>
		    <div class="col-2" style="background-color: white; margin-left:20px; padding: 1%; margin-top: 1%;">
		       	<h5 style="text-align:center;">Empresa</h5>
		    </div>
		  	<div class="col-3" style="background-color: white; margin-left:20px; padding: 1%; margin-top: 1%;">
		      	<h5 style="text-align:center;">Correo Electronico</h5>
			</div>
		</div>
	</div>
	<br>
	<?php
	$i=-1;
	?>
	@foreach ($listaCoauditores as $coauditor)
	<?php
	$i=$i+1;
	?>
	<div class="container-fluid" style="border-radius: 3px; padding: 10px; " >
    	<div class="row">
      	    <div class="col-0" style="background-color: white;  margin-left:15%; ">
      	    	<div >
				  <div class="col-md-9" style="padding: 3px;">
				    <button style="text-align:center; background: #00ACC1" data-toggle="modal" data-target="#modificarCoauditor{{$coauditor->id_persona}}"><img src="images/editar.png" width="20" height="20"></button>
				  </div>
				  <div class="col-md-9" style="padding: 3px;">
				    <button style="text-align:center; background: #00ACC1" data-toggle="modal" data-target="#eliminarCoauditor{{$coauditor->id_persona}}" class="btn-floating btn-small waves-effect waves-light blue"><img src="images/borrar.png" width="20" height="20"></button>
				  </div>
				</div>
           	</div>
           	<div class="col-1" style="background-color: white;">
           		<h8 style="text-align:center;">{{$coauditor->id_persona}}</h8>
            </div>
	     	<div class="col-2" style="background-color: white; margin-left:20px; ">
           		<h8 style="text-align:center;">{{$coauditor->nombre_persona}}</h8>
            </div>
    	   	<div class="col-2" style="background-color: white; margin-left:20px;">
           		<h8 style="text-align:center;">{{$coauditor->nombre_empresa}}</h8>
           	</div>
	      	<div class="col-3" style="background-color: white; margin-left:20px;">
		      	<h8 style="text-align:center;">{{$coauditor->correo_electronico}}</h8>
		    </div>	
		</div>
	</div>
	@include('modales_Administrador.modal_EliminarCoauditor')
	@include('modales_Administrador.modal_ModificarCoauditor')
	@endforeach
</div>
@extends('layouts.footer')

	