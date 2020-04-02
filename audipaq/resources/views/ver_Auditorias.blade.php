@extends('layouts.head')
@include('layouts.menu_Navegacion_Administrador_VerAuditoria')
<br>
<div class="row" style="margin-left: 80%;">
	<button type="button" class="btn btn-primary" style="background: #00ACC1; border: none;"data-toggle="modal" data-target="#crearAuditor">Nueva Auditor&iacute;a</button>
</div>
<br>
<br>
<br>
<br>
<br>
 <form action="ver_Auditor" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="input-group" style="margin-left: 70%; width: 300px">
	 	<input class="form-control" type="search" placeholder="Buscar" name="txtBuscar">
	 	<button class="btn" type="submit" style="background: #00ACC1; border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
	  	<img src="images/buscador.png" width="20" height="20" class="d-inline-block align-top">
	  	</button>
	</div>
</form>
<br>
<br>
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
		    		<!-- Default switch -->
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
		    		<!-- Default switch -->
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
		    		<!-- Default switch -->
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
<div class="container-fluid center-block" style="margin: center; text-align: center; justify-content: center;">
		<div class="row">
			<div class="col-0" style="background-color: white; margin-left:10%; padding: 1%; margin-top: 1%;">
		        <h5 style="text-align:center;">&nbsp;&nbsp;</h5>
			</div>
		    <div class="col-1" style="background-color: white; padding: 1%; margin-top: 1%; border-radius: 3px;">
		        <h5 style="text-align:center;">ID</h5>
			</div>
		    <div class="col-1" style="background-color: white; margin-left:10px; padding: 1%; margin-top: 1%; border-radius: 3px;">
		    	<h5 style="text-align:center;">Nombre</h5>
		    </div>
		    <div class="col-1" style="background-color: white; margin-left:10px; padding: 1%; margin-top: 1%; border-radius: 3px;">
		       	<h5 style="text-align:center;">Empresa</h5>
		    </div>
		  	<div class="col-2" style="background-color: white; margin-left:10px; padding: 1%; margin-top: 1%; border-radius: 3px;">
		      	<h5 style="text-align:center;">Correo Electronico</h5>
			</div>
			<div class="col-2" style="background-color: white; margin-left:10px; padding: 1%; margin-top: 1%; border-radius: 3px;">
		      	<h5 style="text-align:center;">Departamento</h5>
			</div>
			<div class="col-1" style="background-color: white; margin-left:10px; padding: 1%; margin-top: 1%; border-radius: 3px;">
		      	<h5 style="text-align:center;">Auditor</h5>
			</div>
			<div class="col-1" style="background-color: white; margin-left:10px; padding: 1%; margin-top: 1%; border-radius: 3px;">
		      	<h5 style="text-align:center;">Estatus</h5>
			</div>
		</div>
	</div>
	<br>
	<div class="container-fluid" style="border-radius: 3px; padding: 10px; " >
    	<div class="row">
      	    <div class="col-0" style="background-color: white;  margin-left:10%; ">
      	    	<div >
				  <div class="col-md-0" style="padding: 3px;">
				    <button class="btn" style="text-align:center; background: #00ACC1; margin: 1px; width: auto;"><img src="images/editar.png" width="15" height="15"></button>
				  </div>
				  <div class="col-md-9" style="padding: 3px;">
				    <button class="btn" style="text-align:center; background: #00ACC1; margin: 1px; width: auto;"  class="btn-floating btn-small waves-effect waves-light blue"><img src="images/archivos-de-vista.png" width="15" height="15"></button>
				  </div>
				  <div class="col-md-9" style="padding: 3px;">
				    <button class="btn" style="text-align:center; background: #00ACC1; margin: 1px; width: auto;"  class="btn-floating btn-small waves-effect waves-light blue"><img src="images/imprimir.png" width="15" height="15"></button>
				  </div>
				</div>
           	</div>
           	<div class="col-1" style="background-color: white; border-radius: 3px;">
           		<center><h8 style="text-align:center;">XXXXXXXX</h8></center>
            </div>
	     	<div class="col-1" style="background-color: white; margin-left:10px; border-radius: 3px;">
           		<center><h8 style="text-align:center;">XXXXXXXX</h8></center>
            </div>
    	   	<div class="col-1" style="background-color: white; margin-left:10px; border-radius: 3px;">
           		<center><h8 style="text-align:center;">XXXXXXXX</h8></center>
           	</div>
	      	<div class="col-2" style="background-color: white; margin-left:10px; border-radius: 3px;">
		      	<center><h8 style="text-align:center;">XXXXXXXX</h8></center>
		    </div>
		    <div class="col-2" style="background-color: white; margin-left:10px; border-radius: 3px;">
		      	<center><h8 style="text-align:center;">XXXXXXXX</h8></center>
		    </div>
		    <div class="col-1" style="background-color: white; margin-left:10px; border-radius: 3px;">
		      	<center><h8 style="text-align:center;">XXXXXXXX</h8></center>
		    </div>
		    <div class="col-1" style="background-color: white; margin-left:10px; border-radius: 3px;">
		      	<center><h8 style="text-align:center;">XXXXXXXX</h8></center>
		    </div>	
		</div>
	</div>
</div>
@extends('layouts.footer')