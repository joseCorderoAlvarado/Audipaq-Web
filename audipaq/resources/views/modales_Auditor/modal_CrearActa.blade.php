{{-----------------------Modal Crear Acta---------------------------}}
<div id="crearActa" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#546E7A;">
                <h4 class="modal-title" style="color: white" >Crear Acta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
		
            <form action="btnCrear_Acta" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="modal-body mx-auto" style="width: auto; background-color: #ECEFF1">
                    <div class="row">
                            <div class="col-3">
                                <b><label>Fecha Inicio</label></b>
                            </div>
                            <div class="col-5">
                                <input type="date" class="form-control" style="width: auto;" min="2020-01-01" max="2023-12-31" name="txtFechaInicio">
                            </div>
                    </div>
                    <br>
                     <div class="row">
                            <div class="col-3">
                                <b><label>Fecha Final</label></b>
                            </div>
                            <div class="col-5">
                                  <input type="date" class="form-control" style="width: auto;" min="2020-01-01" max="2023-12-31" name="txtFechaFinal">
                            </div>
                    </div>
                    <br>
                    <div class="row">
                            <div class="col-3">
                                <b><label>Auditor</label></b>
                            </div>
                            <div class="col-5">    
                                <input type="text" class="form-control"  name="txtAuditor" style="width: auto;">
                            </div>
                    </div>
                    <br>
                    <div class="row">
                            <div class="col-3">
                                 <b><label>Estatus</label></b>
                            </div>
                            <div class="col-5">
                                  <input type="text" class="form-control" name="txtEstatus" style="width: auto;">
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
                </div>
                <div class="modal-footer" style="background:#546E7A; margin: auto;">
                    <button id="button" class="btn btn-primary" style="background: #00ACC1; border: none; align-items: center;">Guardar</button> 

                </div>
            </form>
        </div>
    </div>
</div>