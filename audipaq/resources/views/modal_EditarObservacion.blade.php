{{-----------------------Modal Editar Observación---------------------------}}
<div id="editarObservacion" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#546E7A;">
                <h4 class="modal-title" style="color: white" >Editar Observación</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
		
            <form action="btnEditar_Observacion" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="modal-body mx-auto" style="width: auto; background-color: #ECEFF1">
                    <div class="row">
                            <div class="col-3">
                                 <b><label>Prioridad</label></b>
                            </div>
                            <div class="col-5">
                                  <input type="text" class="form-control" name="txtPrioridad" style="width: auto;">
                            </div>
                    </div>
                    <br>
                    <div class="row">
                             <div class="col-3">
                                <b><label>Estatus</label></b>
                             </div>
                             <div class="col-5">
                                <input type="text" class="form-control"  name="txtEstatus" style="width: auto;">
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
                            <div class="col-3">
                                <b><label>Área</label></b>
                            </div>
                            <div class="col-5">    
                                <input type="text" class="form-control"  name="txtArea" style="width: auto;">
                            </div>
                    </div>
                    <br>
                    <div class="row">
                            <div class="col-3">
                                <b><label>Departamento</label></b>
                            </div>
                            <div class="col-5">    
                                <input type="text" class="form-control"  name="txtDepartamento" style="width: auto;">
                            </div>
                    </div>
                    <br>
                    <div class="row">
                            <div class="col-2">
                                <b><label>Evidencia</label></b>
                            </div>
                            <div class="col-6">  
                               <input  type="file" id="idevidenciaObservacion" name="evidenciaObservacion">
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