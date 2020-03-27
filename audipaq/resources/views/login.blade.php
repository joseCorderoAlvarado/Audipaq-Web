@extends('layouts.head')
@include('layouts.menu_NavegacionLogin')
<br>
<br>
<div class="container">
	<div class="row">
		<div class="col-4">
		</div>
		<div class="col-4"> 
			<div class="card" style="border: solid 0.5px; border-color: #707070">
				<div class="card-body row">
					<div class="col-1">
					</div>
					<div class="col-10">		
						<form class="formulario" action="btnLogin" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						  <div class="form-group">
						    <label>Correo</label>
						    <input type="email" name="txtCorreoElectronico" class="form-control"placeholder="Introduce tu correo">
						  </div>
						  <div class="form-group">
						    <label >Contraseña</label>
						    <input type="password" name="txtContrasena" class="form-control"  placeholder="Introduce tu contraseña">
						  </div>
						  <br>
						  <center><button type="submit" class="btn btn-primary" style="background: #00ACC1; border: none;">Iniciar Sesi&oacute;n</button></center>
						  <br>
						  <center><a style="color: #00ACC1"><b>¿Olvidaste la contraseña?</b></a></center>
						</form>
					</div>
					<div class="col-1">
					</div>
				</div>
			</div>
		</div>
		<div class="col-4">
		</div>
	</div>
</div>
<br>
<br>
@extends('layouts.footer')