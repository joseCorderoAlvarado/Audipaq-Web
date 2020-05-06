@extends('layouts.head')
@include('layouts.menu_Navegacion_Auditado')
<br>
<div style="background-color: white; border: none; padding: 40px 50px; border-radius: 5px; width: 75%; margin-left: auto; margin-right: auto">

  
  <div class="col-12" style="font-size:35px; font-weight: bold;  font-style:italic;">
  Observaciones
    </div>
@foreach ($listaObservaciones as $observacion)
<form class="needs-validation" novalidate>
      <div class="form-row">
	  {{ csrf_field() }}
        <div class="col-md-4 mb-6">
          <label><b>No. Observación</b></label>
          <input type="text" class="form-control" readonly="readonly"  value="{{$observacion->id_observaciones}}">
        </div>
        <div class="col-md-2 mb-6">
          <label> <b>Aud o Coud</b></label>
          <input type="text" class="form-control" readonly="readonly"  value="{{$observacion->nombre_persona}}">
        </div>
        <div class="col-md-1 mb-6">
          <label><b>Prioridad</b></label>
           <input type="text" class="form-control" readonly="readonly"  value="{{$observacion->tipo_prioridad}}">
        </div>
        <div class="col-md-1 mb-6">
          <label><b>Estatus</b></label>
           <input type="text" class="form-control" readonly="readonly"  value="{{$observacion->tipo_status}}">
        </div>
        <div class="col-md-2 mb-6">
          <label><b>Fecha</b></label>
           <input type="text" class="form-control" readonly="readonly"  value="{{$observacion->fecha}}">
        </div>
        <div class="col-md-2 mb-6">
          <label><b>Documento</b></label>
           <input type="text" class="form-control" readonly="readonly"  value="{{$observacion->nombre_doc}}">
        </div>
      </div>
      <div class="form-row">
        <div class="col-12">
          <label><b>Comentarios</b></label>
           <textarea readonly="readonly" class="form-control" > 
		   {{$observacion->comentarios}}
           </textarea>
        </div>

  
          <label ><b>Auditado  </b></label> &nbsp;&nbsp; <label ><b>XXX</b></label> &nbsp;&nbsp;
          <label ><b>Fecha</b></label> <label > &nbsp;&nbsp;<b>XXXX</b></label>    &nbsp;&nbsp; 
          <label ><b>Evidencia</b></label><label > &nbsp;&nbsp;<b>XXXX</b></label>
        
      </div>
    </form>
	@endforeach
  <input type="hidden" value="" id="idEmpresa">
  <br>
  <!--button type="submit" class="btn btn-primary" style="background: #00ACC1; border: none;"  data-toggle="modal" data-target="#Auditado">Responder</button!-->

</div>
@include('modales_Auditado.modal_Auditado')
@extends('layouts.footer')