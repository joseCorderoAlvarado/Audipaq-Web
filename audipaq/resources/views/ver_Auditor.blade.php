@extends('layouts.head')
@include('layouts.menu_Navegacion_Administrador_VerAuditor')

@include('modalCrear_Auditor')

 <div class="row">
     <div class="col-md-5"></div>
     <div class="col-md-5"></div>
     <div class="col-md-2">
     	<br>
		<button type="button" class="btn btn-primary" style="background: #00ACC1; border: none;" data-toggle="modal" data-target="#crearAuditor">Crear Auditor</button>
      </div>
</div>

 
<center>
  <div class="container-fluid center-block" style="margin: auto; text-align: center; ">
			<div class="container-fluid" style="border-radius: 3px; padding: 10px; ">
				<center>
			   <div class="row">
			      <div class="col-2" style="background-color: white; border: 2px #000000 solid; border-radius: 6px; ">
			        <h5 style="text-align:center;">ID</h5>
			      </div>
			      <div class="col-2" style="background-color: white; border: 2px #000000 solid; border-radius: 6px; ">
			        <h5 style="text-align:center;">Nombre</h5>
			      </div>
			      <div class="col-2" style="background-color: white; border: 2px #000000 solid; border-radius: 6px; ">
			        <h5 style="text-align:center;">Empresa</h5>
			      </div>
			      <div class="col-2" style="background-color: white; border: 2px #000000 solid; border-radius: 6px; ">
			        <h5 style="text-align:center;">Correo Electronico</h5>
			      </div>
			   </div>
			</center>
			</div>



<div class="container-fluid" style="border-radius: 3px; padding: 10px; color: black;  " >
    <div class="row">
      	      <div class="col-2 my-auto" style="background-color: white; border: 2px #000000 solid; border-radius: 6px; ">
          	  <p> 1 <span style="color: gray" class="d-inline-block align-top"></span>   </p>
              </div>
		      <div class="col-2 my-auto" style="background-color: white; border: 2px #000000 solid; border-radius: 6px;">
              <p> Josias <span style="color: gray" class="d-inline-block align-top"></span>   </p>
              </div>
    	      <div class="col-2 my-auto" style="background-color: white; border: 2px #000000 solid; border-radius: 6px;">
              <p>  IT Consult <span style="color: gray" class="d-inline-block align-top"></span></p>
              </div>
		      <div class="col-2 my-auto" style="background-color: white; border: 2px #000000 solid; border-radius: 6px;">
		      <p> itconsult@clientes.mx <span style="color: gray" class="d-inline-block align-top"></span>   </p>
		     </div>	
	</div>
</div>

<div class="container-fluid" style="border-radius: 3px; padding: 10px; color: black; ">
    <div class="row">
      	      <div class="col-2 my-auto" style="background-color: white; border: 2px #000000 solid; border-radius: 6px;  ">
          	  <p> 2 <span style="color: gray" class="d-inline-block align-top"></span>   </p>
              </div>
		      <div class="col-2 my-auto" style="background-color: white; border: 2px #000000 solid; border-radius: 6px;">
              <p> Cesar <span style="color: gray" class="d-inline-block align-top"></span>   </p>
              </div>
    	      <div class="col-2 my-auto" style="background-color: white; border: 2px #000000 solid; border-radius: 6px;">
              <p>  Wizline <span style="color: gray" class="d-inline-block align-top"></span></p>
              </div>
		      <div class="col-2 my-auto" style="background-color: white; border: 2px #000000 solid; border-radius: 6px;">
		      <p> wizline@clientes.mx <span style="color: gray" class="d-inline-block align-top"></span>   </p>
		     </div>	
	</div>
</div>

</div>
</center>


@extends('layouts.footer')


<div id="editarApellidoP" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<h4 class="modal-title">Editar Apellido Paterno</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

           	<form  action="" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}

           		<div class="modal-body">
	            	<input type="hidden" name="txtidPersona" value="dsfsf">
	            	<input id="apellidopaterno"type="text" name="txtApellidoPEditar" style="width: 400px; border: none; background-color: transparent; color: black; border-style: solid; border-color: blue;" value="ddsgfsdf" autofocus="value" pattern="^[ a-zA-ZÁÉÍÓÚñáéíóú]{1,}[\s]*" required="" maxlength="50" onkeypress="return soloLetras(event)">
	            	<p class="text-warning"><small>No dejar este campo vacio.</small></p>
	       		</div>

	        	<div class="modal-footer">
					<button id="button" class="btn btn-primary" style="background-color: #003669; color: white;">Guardar Cambios</button>
				</div>
	        </form>
        </div>
    </div>
</div>