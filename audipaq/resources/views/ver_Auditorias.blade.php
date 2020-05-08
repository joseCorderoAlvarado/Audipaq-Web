@extends('layouts.head')
@include('layouts.menu_Navegacion_Auditor')
@include('modales_Auditor.modal_CrearActa')
<br>
<div class="row" style="margin-left: 80%;">
	<button type="button" class="btn btn-primary" style="background: #00ACC1; border: none;"data-toggle="modal" data-target="#crearActa">Nueva Acta</button>

</div>
<br>
<br>
<form action="ver_Auditorias" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="input-group" style="margin-left: 70%; width: 300px">
	 	<input class="form-control" type="search" placeholder="Buscar" name="txtBuscar" required>
	 	<button class="btn" type="submit" style="background: #00ACC1; border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
	  	<img src="images/buscador.png" width="20" height="20" class="d-inline-block align-top">
	  	</button>
	</div>
</form>
<br>


@if(Session::has('flash_message'))
				<div class="alert alert-success container" role="alert" style="text-align: center; width: 55%">
					{{ Session::get('flash_message') }}
				</div>
			@elseif(Session::has('mensaje'))
				<div class="alert alert-danger container" role="alert" style="text-align: center; width: 55%">
					{{ Session::get('mensaje') }}
				</div>
			@endif
			
<div class="container-fluid center-block" style="margin: center; text-align: center; justify-content: center;">
	<div class="row">
		
		<div class="col-0" style="background-color: white; margin-left:5%; padding: 1%; margin-top: 1%;">
	        <h5 style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;</h5>
		</div>
		<div class="col-1" style="background-color: white; padding: 1%; margin-top: 1%; border-radius: 3px;">
	        <h5 style="text-align:center;">ID</h5>
		</div>
		<div class="col-2" style="background-color: white; margin-left:10px; padding: 1%; margin-top: 1%; border-radius: 3px;">
		    <h5 style="text-align:center;">Fecha inicio</h5>
		</div>
	    <div class="col-2" style="background-color: white; margin-left:10px; padding: 1%; margin-top: 1%; border-radius: 3px;">
		   	<h5 style="text-align:center;">Fecha final</h5>
	    </div>
	  	<div class="col-1" style="background-color: white; margin-left:10px; padding: 1%; margin-top: 1%; border-radius: 3px;">
		    <h5 style="text-align:center;">Auditor</h5>
		</div>
		<div class="col-1" style="background-color: white; margin-left:10px; padding: 1%; margin-top: 1%; border-radius: 3px;">
	      	<h5 style="text-align:center;">Estatus</h5>
		</div>
		<div class="col-1" style="background-color: white; margin-left:10px; padding: 1%; margin-top: 1%; border-radius: 3px;">
	      	<h5 style="text-align:center;">Área</h5>
		</div>
		<div class="col-2" style="background-color: white; margin-left:10px; padding: 1%; margin-top: 1%; border-radius: 3px;">
	      	<h5 style="text-align:center;">Departamento</h5>
		</div>
	</div>
	<hr style="width:95%;">
	@foreach ($listaActas as $acta)
    <div class="row">
   	    <div class="col-0" style="background-color: white;  margin-left:5%; ">
      	    <div >
				<div class="col-md-0" style="padding: 3px;">
				    <button class="btn" style="text-align:center; background: #00ACC1; margin: 1px; width: auto;" data-toggle="modal" data-target="#EditarActa{{$acta->id_acta}}"><img src="images/editar.png" width="15" height="15"></button>
				</div>
				<div class="col-md-9" style="padding: 3px;">
					<form action="verListadoObservaciones_Auditor" method="post" enctype="multipart/form-data" target="_blank">
					{{ csrf_field() }}
					<input type="hidden" name="txtIdActa" value="{{$acta->id_acta}}">
				    <button class="btn" style="text-align:center; background: #00ACC1; margin: 1px; width: auto;"  class="btn-floating btn-small waves-effect waves-light blue"><img src="images/archivos-de-vista.png" width="15" height="15"></a></button>
					</form>
				</div>
				 <div class="col-md-9" style="padding: 3px;">
				    <button class="btn" style="text-align:center; background: #00ACC1; margin: 1px; width: auto;"  class="btn-floating btn-small waves-effect waves-light blue"><img src="images/imprimir.png" width="15" height="15"></button>
				</div>
			</div>
        </div>
        <div class="col-1" style="background-color: white; border-radius: 3px;">
          	<h8 style="text-align:center;">{{$acta->id_acta}}</h8>
        </div>
	    <div class="col-2" style="background-color: white; margin-left:10px; border-radius: 3px;">
          	<h8 style="text-align:center;">{{$acta->fecha_inicio}}</h8>
        </div>
    	<div class="col-2" style="background-color: white; margin-left:10px; border-radius: 3px;">
           	<h8 style="text-align:center;">{{$acta->fecha_final}}</h8>
        </div>
	    <div class="col-1" style="background-color: white; margin-left:10px; border-radius: 3px;">
		  	<h8 style="text-align:center;">{{$acta->nombre_persona}}</h8>
		</div>
		<div class="col-1" style="background-color: white; margin-left:10px; border-radius: 3px;">
		  	<h8 style="text-align:center;">{{$acta->tipo_status}}</h8>
		</div>
		<div class="col-1" style="background-color: white; margin-left:10px; border-radius: 3px;">
		  	<h8 style="text-align:center;">{{$acta->nombre_area}}</h8>
		</div>
		<div class="col-2" style="background-color: white; margin-left:10px; border-radius: 3px;">
		  	<h8 style="text-align:center;">{{$acta->nombre_departamento}}</h8>
		</div>	
	</div>
	<hr style="width:95%;">
	@include('modales_Auditor.modal_EditarActa')
	@endforeach
</div>
<br>
<br>
@extends('layouts.footer')







<!--
<div class="container">
	<div class="row">
	<div class="col-4">
		<div class="card" style="width: 18rem;">
		  <div class="card-body">
		    <h5 class="card-title">Card title</h5>
		    <div class="container">
		    	 <div class="row">
		    	<div class="col-6">
		    		<p class="card-text">Fecha inicio</p>
		    	</div>
		    	<div class="col-6">
		    		<label>xx/xx/xxxx</label>
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-6">
		    		 <p class="card-text">Fecha finalizaci&oacute;n</p>
		    	</div>
		    	<div class="col-6">
		    		<label>xx/xx/xxxx</label>
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-6">
		    		<p class="card-text">Estatus</p>
		    	</div>
		    	<div class="col-6">
					<div class="custom-control custom-switch">
					  <input type="checkbox" class="custom-control-input" id="customSwitches">
					  <label class="custom-control-label" for="customSwitches"></label>
					</div>
		    	</div>
		    </div>
		    </div>
		    <br>
		    <center><button type="button" class="btn btn-primary" style="background: #00ACC1; border: none;">Modificar</button></center>
		  </div>
		</div>
	</div>
	<div class="col-4">
		<div class="card" style="width: 18rem;">
		  <div class="card-body">
		    <h5 class="card-title">Card title</h5>
		    <div class="container">
		    	 <div class="row">
		    	<div class="col-6">
		    		<p class="card-text">Fecha inicio</p>
		    	</div>
		    	<div class="col-6">
		    		<label>xx/xx/xxxx</label>
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-6">
		    		 <p class="card-text">Fecha finalizaci&oacute;n</p>
		    	</div>
		    	<div class="col-6">
		    		<label>xx/xx/xxxx</label>
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-6">
		    		<p class="card-text">Estatus</p>
		    	</div>
		    	<div class="col-6">
					<div class="custom-control custom-switch">
					  <input type="checkbox" class="custom-control-input" id="customSwitches">
					  <label class="custom-control-label" for="customSwitches"></label>
					</div>
		    	</div>
		    </div>
		    </div>
		    <br>
		    <center><button type="button" class="btn btn-primary" style="background: #00ACC1; border: none;">Modificar</button></center>
		  </div>
		</div>
	</div>
	<div class="col-4">
		<div class="card" style="width: 18rem;">
		  <div class="card-body">
		    <h5 class="card-title">Card title</h5>
		    <div class="container">
		    	 <div class="row">
		    	<div class="col-6">
		    		<p class="card-text">Fecha inicio</p>
		    	</div>
		    	<div class="col-6">
		    		<label>xx/xx/xxxx</label>
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-6">
		    		 <p class="card-text">Fecha finalizaci&oacute;n</p>
		    	</div>
		    	<div class="col-6">
		    		<label>xx/xx/xxxx</label>
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-6">
		    		<p class="card-text">Estatus</p>
		    	</div>
		    	<div class="col-6">
					<div class="custom-control custom-switch">
					  <input type="checkbox" class="custom-control-input" id="customSwitches">
					  <label class="custom-control-label" for="customSwitches"></label>
					</div>
		    	</div>
		    </div>
		    </div>
		    <br>
		    <center><button type="button" class="btn btn-primary" style="background: #00ACC1; border: none;">Modificar</button></center>
		  </div>
		</div>
	</div>
</div>
</div>
<br>
<br>
-->