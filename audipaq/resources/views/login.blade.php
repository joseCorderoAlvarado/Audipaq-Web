@extends('layouts.head')
@include('layouts.menu_NavegacionLogin')
@include('modal_Login.modal_recuperarContrasena')
<br />
<br />
<div class="modal-dialog" >
	@if(Session::has('flash_message'))
        <div class="alert alert-success" role="alert">
          {{ Session::get('flash_message') }}
        </div>
      @elseif(Session::has('mensaje'))
        <div class="alert alert-danger" role="alert">
          {{ Session::get('mensaje') }}
        </div>
      @endif
	<div class="modal-content">
		<div class="modal-body">
			<form class="formulario" action="btnLogin" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
				<div class="form-group">
					<label>Correo</label>
					<input type="email" name="txtCorreoElectronico" class="form-control"placeholder="Introduce tu correo" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="El correo debe contener entre caracteres el símbolo de '@' en seguida el símbolo de '.' y finalmente el dominio" required>
				</div>
				<div class="form-group">
					<label >Contraseña</label>
					<input type="password" name="txtContrasena" class="form-control"  placeholder="Introduce tu contraseña" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="La contraseña debe contener al menos 8 caracteres invluyendo como mínimo un número, una minúscula y una mayúscula" required>
				</div>
				<br>
				<center><button type="submit" class="btn btn-primary" style="background: #00ACC1; border: none;">Iniciar Sesi&oacute;n</button></center>
				<br>
				<center><a style="color: #00ACC1" data-toggel="modal" href="#recuperarContrasena" data-idmodal="#recuperarContrasena"><b>¿Olvidaste la contraseña?</b></a></center>
			</form>
		</div>	
	</div>
</div>
<br />
<br />
<br />
@extends('layouts.footer')