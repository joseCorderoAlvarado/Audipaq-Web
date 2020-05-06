{{-----------------------Modal de Crear una Empresa---------------------------}}
<div id="Auditado" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#546E7A;">
                <h4 class="modal-title" style="color: white" >ResponderObservacion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
		
            <form class="formulario" action="btnCrearEmpresa" method="post" enctype="multipart/form-data" style="padding-left: 20px; padding-right: 20px; padding-top: 10px; padding-bottom: 10px;">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Responder Observación</label>
                                  <textarea  class="form-control" readonly="readonly"  >
                                  </textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Documento</label>
                            <input multiple="multiple"  name="documentos[]" type="file" style="padding: 5px 10px; background: #546E7A; color:#fff; border:0px solid #fff; ">
                        </div>
                    </div>
                </div>
                
                
            <br>
            <div class="modal-footer" style="background:#546E7A;">
                <button type="submit" class="btn btn-primary" style="background: #00ACC1; border: none;">Guardar</button>
            </div>
		</form>
        </div>
    </div>
</div>