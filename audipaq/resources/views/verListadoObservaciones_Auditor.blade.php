@extends('layouts.head')
@include('layouts.menu_Navegacion_Auditor')
<br>
<button type="button" class="btn btn-primary" style="background: #00ACC1; border: none; margin-left: 80%"data-toggle="modal" data-target="#crearObservacion">Nueva Observaci&oacute;n</button>
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div style="width:auto; height:600px; background-color: white; border: 1px groove; border-color: #707070; border-radius: 3px;">
				<p style=" margin: 20px 45px; font-size: 20px">Observaci&oacute;n</p>
				<div class="container" style="margin: 20px 30px;">
					<div class="row">
						<div class="col-3">
							<p >Descripci&oacute;n</p>
							xxxxxxxxxxxx xxx xxxx
							xxx xxx xxxx xxxx
						</div>
						<div class="col-1">
							<p>Auditor</p>
							xxxxxxxxx
						</div>
						<div class="col-1">
							<p>Prioridad</p>
							xxxxxxx
						</div>
						<div class="col-1">
							<p>Estatus</p>
							xxxxxxxxx
						</div>
						<div class="col-2">
							<p>Fecha</p>
							<input type="date" id="idfechaObservacion" name="fechaObservacion" disabled="true">
						</div>
						<div class="col-4">
							<p>Evidencia</p>
							<input type="file" id="idevidenciaObservacion" name="fechaObservacion">
						</div>
					</div>
				</div>
				<div class="container" style="margin: 20px 30px;">
					<div class="row">
						<div class="col-12">
							<p style=" margin-top: 20px; font-size: 20px">Comentarios</p>
							<input type="text" id="idcomentarioObservacion" name="comentarioObservacion" style="width: 1000px; height: 80px; border: 0.7px solid; border-color: #707070; border-radius: 5px">
						</div>
					</div>
					<div class="row">
						<div class="col-2">
							Auditado:&nbsp;xxxxxxxxx
						</div>
						<div class="col-2">
							Fecha:&nbsp;xx/xx/xxxx
						</div>
						<div class="col-5">
							Evidencia:&nbsp;<input type="file" id="idevidenciaComentarioObservacion" name="evidenciaComentarioObservacion">
						</div>
						<div class="col-1">
							
						</div>
						<div class="col-1">
							
						</div>
						<div class="col-1">
							
						</div>
					</div>
				</div>
				<div class="container" style="margin: 20px 30px;">
					<div class="row">
						<div class="col-12">
							<p style=" margin-top: 20px; font-size: 20px">Respuesta</p>
							<input type="text" id="idcomentarioObservacion" name="comentarioObservacion" style="width: 1000px; height: 60px; border: 0.7px solid; border-color: #707070; border-radius: 5px">
						</div>
					</div>
				</div>
				<div class="container" style="margin: 20px 45px;">
					<div class="row">
						<button type="button" class="btn btn-primary" style="background: #00ACC1; border: none;" data-target="#crearAuditor">Responder</button>
					</div>
				</div>			
			</div>
		</div>
	</div>
</div>
<br><br>
@extends('layouts.footer')


