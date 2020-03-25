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
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Correo</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce tu correo">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Introduce tu contraseña">
  </div>
  <br>
  <center><button type="submit" class="btn btn-primary" style="background: #00ACC1; border: none;">Iniciar Sesi&oacute;n</button></center><br>
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