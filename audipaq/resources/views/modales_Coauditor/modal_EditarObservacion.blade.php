{{-----------------------Modal Editar Observación---------------------------}}
<div id="editarObservacion{{$observacion->id_observaciones}}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#546E7A;">
                <h4 class="modal-title" style="color: white" >Editar Observación</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
        
            <form action="btnEditar_Observacion_Coa" method="post"  enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="modal-body mx-auto" style="width: auto; background-color: #ECEFF1">
                     <div class="row">
                            <div class="col-4">
                                 <b><label>ID del Acta</label></b>
                            </div>
                            <div class="col-4">
                                  <input type="text" class="form-control" name="txtIdACta" readonly="true" style="border-radius: 5px" value="{{$observacion->id_acta}}">
                            </div>
                    </div>
                    <br>
                     <div class="row">
                            <div class="col-4">
                                 <b><label>No. de Observación</label></b>
                            </div>
                            <div class="col-4">
                                  <input type="text" class="form-control" name="txtIdObservacion" readonly="true" style="border-radius: 5px" value="{{$observacion->id_observaciones}}">
                            </div>
                    </div>
                    <br>
                    <div class="row">
                       
                            <div class="col-3">
                                 <b><label>Prioridad</label></b>
                            </div>
                            <div class="col-5">
                                 <select name="fkPrioridad" class="form-control" style="width: auto;">
                                    <option value="{{$observacion->id_prioridad}}" selected>{{$observacion->tipo_prioridad}}
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
                                    <option value="{{$observacion->id_status}}" selected>{{$observacion->tipo_status}}
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
                                  <textarea  type="text" id="idcomentarioObservacion" name="txtObservacion" title="La observación debe llevar solo letras, números y espacios" pattern="[A-Za-z0-9\s]+" required style="width: 250px; height: 80px; border: 0.7px solid; border-color: transparent; border-radius: 5px; color:gray;"  >{{$observacion->comentarios}}</textarea>
                            </div>
                    </div>
                   
                    <br>
                    <div class="row" >
                        <div class="col-12">
                            <b><p>Reemplazar Evidencia(s) (tamaño máximo de 128 Mb)</p></b>

                            @foreach($listaDocumento as $doc)
                                <?php
                                echo "<label style='font-size:14px;'>Reemplazar el documento: ".$doc->nombre_doc."</label>";
                                ?>
                                <input multiple="multiple"  name="documentosModificar[]" type="file" style="padding: 5px 10px; background: #546E7A; color:#fff; border:0px solid #fff; ">
                                <?php
                                echo "<input type='hidden' class='form-control' name='id_documentos[]'  value='$doc->id_doc'>";
                                echo "<br>";
                                ?>
                                
                            @endforeach
                            
                        </div>
                             
                    </div>  
                    <br>
                <div class="modal-footer" style="background:#546E7A; margin: auto;">
                    <button id="button" class="btn btn-primary" style="background: #00ACC1; border: none; align-items: center;">Guardar</button> 
                </div>
            </form>
        </div>
    </div>
</div>