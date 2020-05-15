@extends('layouts.head')
@include('layouts.menu_NavegacionLogin')
<br />
<br />
<div class="modal-dialog" >
	<!--@if(Session::has('flash_message'))
        <div class="alert alert-success" role="alert">
          {{ Session::get('flash_message') }}
        </div>
      @elseif(Session::has('mensaje'))
        <div class="alert alert-danger" role="alert">
          {{ Session::get('mensaje') }}
        </div>
      @endif-->
	<div class="modal-content">
		<div class="modal-body">
			<form class="formulario" action="btnReestablecer" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
				<div class="form-group">
					<label>Nueva contraseña</label>
					<input type="password" name="txtContrasenaNueva" class="form-control"placeholder="Introduce tu contraseña" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="La contraseña debe contener al menos 8 caracteres invluyendo como mínimo un número, una minúscula y una mayúscula" required>
				</div>
				<div class="form-group">
					<label >Confirmar contraseña</label>
					<input type="password" name="txtContrasenaConfirmada" class="form-control"  placeholder="Introduce tu contraseña de nuevo" required>
				</div>
				<br>
				<center><button type="submit" class="btn btn-primary" style="background: #00ACC1; border: none;">Reestablecer contraseña</button></center>
			</form>
		</div>	
	</div>
</div>
<br />
<br />
<br />
@extends('layouts.footer')