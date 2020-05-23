@extends('layouts.head')
@include('layouts.menu_Navegacion_Auditor')
@include('modales_Auditor.modal_CrearObservacion')
<br>
<button type="button" class="btn btn-primary" style="background: #00ACC1; border: none; margin-left: 80%"data-toggle="modal" data-target="#crearObservacion{{$id_acta}}">Nueva Observaci&oacute;n</button>
<br><br><br>

<p style=" margin: 20px 45px; font-size: 30px">Observaciones del acta no. {{$id_acta}}</p>

@foreach ($listaObservaciones as $observacion)
<div class="container">
	<div class="row">
		<div class="col-12">
			@if(Session::has('flash_message'))
				<div class="alert alert-success container" role="alert" style="text-align: center; width: 55%">
					{{ Session::get('flash_message') }}
				</div>
			@elseif(Session::has('mensaje'))
				<div class="alert alert-danger container" role="alert" style="text-align: center; width: 55%">
					{{ Session::get('mensaje') }}
				</div>
			@endif
			<div style="width:auto; height: auto; background-color: white; border: 1px groove; border-color: #707070; border-radius: 3px;">
				<p style=" margin: 20px 45px; font-size: 20px">Observaci&oacute;n no. {{$observacion->id_observaciones}}</p>
				<div class="container" style="margin: 20px 30px;">
					<div class="row">
						<div class="col-1">
							<p>Auditor</p>

							<?php 
							$auditor = DB::table('persona')
							->join('acta', 'persona.id_persona', '=', 'acta.fk_id_auditor')
							->select('persona.nombre_persona')
							->where('acta.id_acta','=',$id_acta)
							->get();	
							?>

							<b><h8 style="text-align:center; background-color: #ECEFF1;">{{$auditor[0]->nombre_persona}}</h8></b>
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
							<p>Evidencia(s)</p>

							<?php
							$listaDocumento = DB::select('SELECT doc.nombre_doc,doc.id_doc, doc.evidencia 
								FROM detalle
								INNER JOIN doc ON doc.id_doc=detalle.fk_id_doc
								INNER JOIN observaciones ON observaciones.id_observaciones=detalle.fk_id_observaciones
								WHERE observaciones.fk_id_acta=? AND detalle.fk_id_observaciones=?'
								,[$observacion->id_acta,$observacion->id_observaciones]);
							?>

							@foreach($listaDocumento as $doc)
								<?php
								echo "<a title='Descargar Archivo' href='$doc->evidencia' download='$doc->evidencia'  style='color: blue; font-size:18px;'>". $doc->nombre_doc."</a>";
								echo "<br>";

								?>
							@endforeach
						</div>
					</div>
				</div>
				<div class="container" style="margin: 20px 30px;">
					<div class="row">
						<div class="col-12">
							<b><p style=" margin-top: 20px; font-size: 15px">Decripción:</p></b>
							<textarea  type="text" id="idcomentarioObservacion" name="comentarioObservacion" style="width: 1000px; height: 80px; border: 0.7px solid; border-color: transparent; border-radius: 5px; color:gray;" readonly="true" >{{$observacion->comentarios}}</textarea>
						</div>
					</div>
							
					<br>
					<div class="row" >
						<div class="col-10">
							Encargado y Area auditada: 
							<b><h8 style="text-align:center; background-color: #ECEFF1;">{{$observacion->encargado_area}} de {{$observacion->nombre_area}}</h8></b>
						</div>
						<div class="col-10">
							Encargado y departamento auditado: 
							<b><h8 style="text-align:center; background-color: #ECEFF1;">{{$observacion->encargado_departamento}} de {{$observacion->nombre_departamento}}</h8></b>
						</div  >
							
						<div class="col-1">
							
						</div>
						<div class="col-10">
							Auditado:
							<?php 
							$auditado = DB::table('persona')
							->join('acta', 'persona.id_persona', '=', 'acta.fk_id_persona')
							->select('persona.nombre_persona','persona.apellido_paterno','persona.apellido_materno','persona.correo_electronico')
							->where('acta.id_acta','=',$id_acta)
							->get();	
							?>
							<b><h8 style="text-align:center; background-color: #ECEFF1;">{{$auditado[0]->nombre_persona}} {{$auditado[0]->apellido_paterno}} {{$auditado[0]->apellido_materno}} con correo electrónico: {{$auditado[0]->correo_electronico}}</h8></b>
						</div>
					</div>
				</div>

				<!-- Aquí va el código de las respuestas -->

				<div class="container" style="margin: 20px 45px;">
					<div class="row">
						<button type="button" class="btn btn-primary" style="background: #00ACC1; border: none;" data-toggle="modal" data-target="#editarObservacion{{$observacion->id_observaciones}}">Editar</button>
						
					</div>
				</div>			
			</div>
		</div>
	</div>
</div>
<br>
<br>
@include('modales_Auditor.modal_EditarObservacion')
@endforeach

@extends('layouts.footer')


<script type="text/javascript">
	function cambiar()
	{
    	var pdrs = document.getElementById('file-upload').files[3].name;
    	document.getElementById('info').innerHTML = pdrs;
	}

	function cambiar2()
	{
    	var pdrs = document.getElementById('file-upload2').files[3].name;
    	document.getElementById('info2').innerHTML = pdrs;
	}

	function cambiar3()
	{
    	var pdrs = document.getElementById('file-upload3').files[3].name;
    	document.getElementById('info3').innerHTML = pdrs;
	}
</script>

<style type="text/css">
	.subi
	{
	    padding: 5px 10px;
	    background: #546E7A;
	    color:#fff;
	    border:0px solid #fff;
	}
 
	.subir:hover
	{
    	color:black;
    	background: #ECEFF1;
	}
</style>

<!-- Código de las respuestas-->

<!--
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

				-->
