<meta charset=utf-8 />
@extends('layouts.head')
@include('layouts.menu_Navegacion_Auditor')
@include('modales_Auditor.modal_CrearObservacion')
@include('modales_Auditor.modal_EditarObservacion')
<br>
<button type="button" class="btn btn-primary" style="background: #00ACC1; border: none; margin-left: 80%"data-toggle="modal" data-target="#crearObservacion">Nueva Observaci&oacute;n</button>
<br><br><br>

@foreach ($listaObservaciones as $observacion)
<div class="container">
	<div class="row">
		<div class="col-12">
			<div style="width:auto; height: auto; background-color: white; border: 1px groove; border-color: #707070; border-radius: 3px;">
				<p style=" margin: 20px 45px; font-size: 20px">Observaci&oacute;n</p>
				<div class="container" style="margin: 20px 30px;">
					<div class="row">
						<div class="col-1">
							<p>Auditor</p>
							<b><h8 style="text-align:center; background-color: #ECEFF1;">{{$observacion->nombre_persona}}</h8></b>
						</div>
						<div class="col-1">
							<p>Prioridad</p>
							<b><h8 style="text-align:center; background-color: #ECEFF1;">{{$observacion->tipo_prioridad}}</h8></b>
						</div>
						<div class="col-1">
							<p>Estatus</p>
							<b><h8 style="text-align:center; background-color: #ECEFF1;">{{$observacion->tipo_status}}</h8></b>
						</div>
						<div class="col-3">
							<p>Fecha</p>
							<b><h8 style="text-align:center; background-color: #ECEFF1;">{{$observacion->fecha_inicio}}</h8></b>
						</div>
						<div class="col-6">
							<p>Evidencia</p>
							
							<label for="file-upload" class="subir">
							   <i class="fa fa-cloud-upload" aria-hidden="true"></i> Subir archivo
							</label>
							<input id="file-upload" onchange='cambiar()' type="file" style='display: none;'/>
							<label id="info" style="background-color: #ECEFF1; width: unset;"></label>
						</div>
					</div>
				</div>
				<div class="container" style="margin: 20px 30px;">
					<div class="row">
						<div class="col-12">
							<p style=" margin-top: 20px; font-size: 20px">Comentario inicial de la observación</p>
							<textarea  type="text" id="idcomentarioObservacion" name="comentarioObservacion" style="width: 1000px; height: 80px; border: 0.7px solid; border-color: transparent; border-radius: 5px; color:gray;" readonly=true" >{{$observacion->comentarios}}</textarea>
						</div>
					</div>
							
					<br>
					<div class="row" >
						<div class="col-4">
							Auditado: 
							<b><h8 style="text-align:center; background-color: #ECEFF1;">{{$observacion->encargado_area}} de {{$observacion->nombre_area}}</h8></b>
						</div>
						<div class="col-1">
							
						</div>
						<div class="col-1">
							
						</div>
						<div class="col-1">
							
						</div>
					</div>
				</div>
				<div class="container" style="margin: 20px 30px; border-style: solid; border-color: #707070; width: 95%;">
					<div class="row">
						<div class="col-2">
							<b><h5>Respuesta</h5></b>
						</div>
						<div class="col-3">
							Fecha:
							<b><h8 style="text-align:center; background-color: #ECEFF1;"></h8></b>
						</div>
						<div class="col-5">
							Evidencia:&nbsp;
							<label for="file-upload2" class="subir">
							   <i class="fa fa-cloud-upload" aria-hidden="true"></i> Subir archivo
							</label>
							<input id="file-upload2" onchange='cambiar2()' type="file" style='display: none;'/>
							<label id="info2" style="background-color: #ECEFF1; width: unset;"></label>
						</div>
						<div class="col-12">
							<textarea  type="text" id="respuestaObservacion" name="respuestaObservacion" style="width: 1000px; height: 80px; border: 0.7px solid; border-color: #707070; border-radius: 5px; color:gray;" readonly=true" ></textarea>
						</div>
						<br>
						<br>
						<br>
						<br>
						<br>
					</div>
				</div>
				<div class="container" style="margin: 20px 30px; border-style: solid; border-color: #707070; width: 95%;">
					<div class="row">
						<div class="col-2">
							<b><h5>Respuesta</h5></b>
						</div>
						<div class="col-3">
							Fecha:
							<b><h8 style="text-align:center; background-color: #ECEFF1;"></h8></b>
						</div>
						<div class="col-5">
							Evidencia:&nbsp;
							<label for="file-upload2" class="subir">
							   <i class="fa fa-cloud-upload" aria-hidden="true"></i> Subir archivo
							</label>
							<input id="file-upload2" onchange='cambiar2()' type="file" style='display: none;'/>
							<label id="info2" style="background-color: #ECEFF1; width: unset;"></label>
						</div>
						<div class="col-12">
							<textarea  type="text" id="respuestaObservacion" name="respuestaObservacion" style="width: 1000px; height: 80px; border: 0.7px solid; border-color: #707070; border-radius: 5px; color:gray;" readonly=true" ></textarea>
						</div>
						<br>
						<br>
						<br>
						<br>
						<br>
					</div>
				</div>
				
				<div class="container" style="margin: 20px 45px;">
					<div class="row">
						<button type="button" class="btn btn-primary" style="background: #00ACC1; border: none;" data-target="#crearAuditor">Responder</button>
						<button type="button" class="btn btn-primary" style="background: #00ACC1; border: none; margin-left:7px;" data-toggle="modal" data-target="#editarObservacion">Editar</button>
					</div>
				</div>			
			</div>
		</div>
	</div>
</div>
<br>
<br>
@endforeach

@extends('layouts.footer')


<script type="text/javascript">
	function cambiar(){
    var pdrs = document.getElementById('file-upload').files[0].name;
    document.getElementById('info').innerHTML = pdrs;
    
	}

	function cambiar2(){
    var pdrs = document.getElementById('file-upload2').files[0].name;
    document.getElementById('info2').innerHTML = pdrs;
}
</script>

<style type="text/css">
	.subir{
    padding: 5px 10px;
    background: #546E7A;
    color:#fff;
    border:0px solid #fff;
}
 
.subir:hover{
    color:black;
    background: #ECEFF1;
}
</style>