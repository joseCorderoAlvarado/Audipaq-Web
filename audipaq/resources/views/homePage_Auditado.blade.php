@extends('layouts.head')
@include('layouts.menu_Navegacion_Auditado')
<br>
<div style="background-color: white; border: none; padding: 40px 50px; border-radius: 5px; width: 75%; margin-left: auto; margin-right: auto">

  
  <div class="col-12" style="font-size:35px; font-weight: bold;  font-style:italic;">
  Observaciones
    </div>

<form class="needs-validation" novalidate>
      <div class="form-row">
        <div class="col-md-4 mb-6">
          <label><b>Descripción</b></label>
           <textarea  class="form-control" readonly="readonly"  >
           </textarea>
        </div>
        <div class="col-md-2 mb-6">
          <label> <b>Aud o Coud</b></label>
          <input type="text" class="form-control" readonly="readonly"  value="">
        </div>
        <div class="col-md-1 mb-6">
          <label><b>Prioridad</b></label>
           <input type="text" class="form-control" readonly="readonly"  value="">
        </div>
          <div class="col-md-1 mb-6">
          <label><b>Estatus</b></label>
           <input type="text" class="form-control" readonly="readonly"  value="">
        </div>
          <div class="col-md-2 mb-6">
          <label><b>Fecha</b></label>
           <input type="text" class="form-control" readonly="readonly"  value="">
        </div>
           <div class="col-md-2 mb-6">
          <label><b>Documento</b></label>
           <input type="text" class="form-control" readonly="readonly"  value="">
        </div>

      </div>
      <div class="form-row">
        <div class="col-12">
          <label><b>Comentarios</b></label>
           <textarea readonly="readonly" class="form-control" > 
           </textarea>
        </div>

  
          <label ><b>Auditado  </b></label> &nbsp;&nbsp; <label ><b>XXX</b></label> &nbsp;&nbsp;
          <label ><b>Fecha</b></label> <label > &nbsp;&nbsp;<b>XXXX</b></label>    &nbsp;&nbsp; 
          <label ><b>Evidencia</b></label><label > &nbsp;&nbsp;<b>XXXX</b></label>
       
        <div class="col-12">
          <label ><b>Respuesta</b></label>
           <textarea  class="form-control" readonly="readonly"  >
           </textarea>
        </div>
        
      </div>
    </form>
  <input type="hidden" value="" id="idEmpresa">
  <br>
  <button type="submit" class="btn btn-primary" style="background: #00ACC1; border: none;"  data-toggle="modal" data-target="#Auditado">Responder</button>

</div>
@include('modales_Auditado.modal_Auditado')
@extends('layouts.footer')