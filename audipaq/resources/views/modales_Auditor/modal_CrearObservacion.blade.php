{{-----------------------Modal Crear Observación---------------------------}}
<div id="crearObservacion{{$id_acta}}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#546E7A;">
                <h4 class="modal-title" style="color: white" >Crear Observación</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
		
            <form action="btnCrear_Observacion" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="modal-body mx-auto" style="width: auto; background-color: #ECEFF1">
                     <div class="row">
                            <div class="col-4">
                                 <b><label>ID del Acta</label></b>
                            </div>
                            <div class="col-4">
                                  <input type="text" class="form-control" name="txtIdACta" readonly="true" border-radius: 5px" value="{{$id_acta}}">
                            </div>
                    </div>
                    <br>
					<div class="row">
					   
                            <div class="col-3">
                                 <b><label>Prioridad</label></b>
                            </div>
                            <div class="col-5">
                                 <select name="fkPrioridad" class="form-control" style="width: auto;">
    							    <option selected>Selecciona la prioridad
                                    </option>
                                    @foreach ($listaPrioridad as $prioridad)
                                    <option value={{$prioridad->id_prioridad }}>
                                        {{ $prioridad->tipo_prioridad}} 
                                    </option>
                                    @endforeach		
    							</select> 
                            </div>
                    </div>
                    <br>
                    <div class="row">
                             <div class="col-3">
                                <b><label>Estatus</label></b>
                             </div>
                             <div class="col-5">
                                <select name="fkStatus" class="form-control" style="width: auto;">
    							    <option selected>Selecciona el estatus
                                    </option>
                                    @foreach ($listaStatus as $estatus)
                                    <option value={{$estatus->id_status }}>
                                        {{ $estatus->tipo_status}} 
                                    </option>
                                    @endforeach		
    							</select> 
                             </div>
                    </div>
                    <br>
                    <div class="row">
                            <div class="col-3">
                                 <b><label>Observación</label></b>
                            </div>
                            <div class="col-5">
                                  <input type="text" class="form-control" name="txtObservacion" style="width: 200px; height: 80px;  border-radius: 5px">
								
                            </div>
                    </div>
                   
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <p>Evidencia</p>
                            
                            <div class="photo">
                                <div class="input-group">
                                <input multiple="multiple"  name="documentos[]" type="file" style="padding: 5px 10px; background: #546E7A; color:#fff; border:0px solid #fff; ">
                                </div>
                             </div>
                        </div>
                             
                    </div>       
                </div>
                <div class="modal-footer" style="background:#546E7A; margin: auto;">
                    <button id="button" class="btn btn-primary" style="background: #00ACC1; border: none; align-items: center;">Guardar</button> 
                </div>
            </form>
        </div>
    </div>
</div>