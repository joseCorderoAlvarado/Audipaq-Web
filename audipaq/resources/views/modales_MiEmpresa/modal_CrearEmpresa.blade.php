{{-----------------------Modal de Crear una Empresa---------------------------}}
<div id="crearEmpresa" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#546E7A;">
                <h4 class="modal-title" style="color: white" >Registrar empresa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
		
            <form class="formulario" action="btnCrearEmpresa" method="post" enctype="multipart/form-data" style="padding-left: 20px; padding-right: 20px; padding-top: 10px; padding-bottom: 10px;">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" id="idnombreEmpresa" name="nombreEmpresa" class="form-control" title="El nombre debe llevar solo letras, numeros y espacios" pattern="[A-Za-z0-9\sáéíóúñüàèÁÉÍÓÚÑÜÀÈ]+" required>
                        </div>
                       
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Giro</label>
                            <input type="text" id="idgiroEmpresa" name="giroEmpresa" class="form-control" pattern="[A-Za-z\sáéíóúñüàèÁÉÍÓÚÑÜÀÈ]+"
                            title="El giro debe llevar solo letras y espacios" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Misión</label>
                            <textarea id="idmisionEmpresa" name="misionEmpresa" class="form-control" pattern="[A-Za-z\sáéíóúñüàèÁÉÍÓÚÑÜÀÈ]+"
                            title="La mision debe llevar solo letras y espacios" required></textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Visión</label>
                            <textarea id="idvisionEmpresa" name="visionEmpresa" class="form-control" pattern="[A-Za-z\sáéíóúñüàèÁÉÍÓÚÑÜÀÈ]+"
                            title="La Vision debe llevar solo letras y espacios" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Valores</label>
                            <input type="text" id="idvaloresEmpresa" name="valoresEmpresa" class="form-control" pattern="[A-Za-z\sáéíóúñüàèÁÉÍÓÚÑÜÀÈ]+"
                            title="Los valores debe llevar solo letras y espacios" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" id="iddireccionEmpresa" name="direccionEmpresa" class="form-control" pattern="[A-Za-z\s#0-9áéíóúñüàèÁÉÍÓÚÑÜÀÈ]+" title="La direccion debe llevar solo letras, #, números y espacios" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input type="text" id="idtelefonoEmpresa" name="telefonoEmpresa" class="form-control" pattern="[0-9]+" required="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="text" id="idcorreoEmpresa" name="correoEmpresa" class="form-control" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="El correo debe de llevar un @" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Logotipo</label>
                            <div class="photo">
                                <div class="input-group">
                                <input name="logotipo[]" type="file"accept="image/*" required style="padding: 5px 10px; background: #546E7A; color:#fff; border:0px solid #fff; ">
                                </div>
                             </div>
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