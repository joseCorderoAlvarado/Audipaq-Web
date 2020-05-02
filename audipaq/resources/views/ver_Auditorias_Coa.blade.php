@extends('layouts.head')
@include('layouts.menu_Navegacion_Administrador_VerAuditor')
@include('modales_Coauditor.modal_CrearCoauditor')
@include('modales_Coauditor.modal_ModificarCoauditor')
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
		       	<h5 style="text-align:center;">Coauditor</h5>
		    </div>
		  	<div class="col-2" style="background-color: white; margin-left:20px; padding: 1%; margin-top: 1%;">
		      	<h5 style="text-align:center;">Correo Electronico</h5>
			</div>
		</div>
	</div>
	<br>
	
	<div class="container-fluid" style="border-radius: 3px; padding: 10px; " >
    	<div class="row">
      	    <div class="col-0" style="background-color: white;  margin-left:15%; ">
      	    	<div >
				  <div class="col-md-9" style="padding: 3px;">
				    <button style="text-align:center; background: #00ACC1" data-toggle="modal" data-target="#modificarCoauditor"><img src="images/editar.png" width="20" height="20"></button>
				  </div>
				  <div class="col-md-9" style="padding: 3px;">
				    <button style="text-align:center; background: #00ACC1" data-toggle="modal" data-target="#eliminarCoauditor" class="btn-floating btn-small waves-effect waves-light blue"><img src="images/borrar.png" width="20" height="20"></button>
				  </div>
				</div>
           	</div>
           	<div class="col-1" style="background-color: white;">
           	
            </div>
	     	<div class="col-2" style="background-color: white; margin-left:20px; ">
           		
            </div>
    	   	<div class="col-2" style="background-color: white; margin-left:20px;">
           		
           	</div>
	      	<div class="col-2" style="background-color: white; margin-left:20px;">
		      	
		    </div>
		    	
		</div>
	</div>

</div>

@extends('layouts.footer')