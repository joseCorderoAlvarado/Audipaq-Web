@extends('layouts.head')
@include('layouts.menu_Navegacion_Administrador_VerAuditor')

 <div class="row">
     <div class="col-md-5"></div>
     <div class="col-md-5"></div>
     <div class="col-md-2">
            <form class="formulario" action="" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
				<button type="submit" class="btn btn-primary" href="#crear_Auditor" style="background: #00ACC1; border: none;">Crear Auditor</button>
		    </form>
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