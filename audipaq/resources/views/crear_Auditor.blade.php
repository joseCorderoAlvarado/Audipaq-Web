<div id="crearAuditor" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<h4 class="modal-title">Crear Auditor/Coauditor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body mx-auto" style="width: auto;">
                <form>
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nombre</label>
                            <input type="text" class="form-control" id="txtnombreAuditor">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Correo</label>
                            <input type="email" class="form-control" id="correoAuditor">
                         </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Apellido Paterno</label>
                            <input type="text" class="form-control" id="txtapellidoPatAuditor">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Contrase&ntilde;a</label>
                            <input type="password" class="form-control" id="correoAuditor">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Apellido Paterno</label>
                            <input type="text" class="form-control" id="txtapellidoMatAuditor">
                        </div>
                    </div>       
    		</div>
	        <div class="modal-footer">
				<button id="button" class="btn btn-primary" style="background: #00ACC1; border: none;">Guardar</button>
			</div>
	            </form>
        </div>
    </div>
</div>