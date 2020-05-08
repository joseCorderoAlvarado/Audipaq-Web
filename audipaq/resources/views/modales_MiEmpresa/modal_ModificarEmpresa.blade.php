{{-----------------------Modal de Modificar una Empresa---------------------------}}
<div id="modificarEmpresa{{$empresas->id_empresa}}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#546E7A;">
                <h4 class="modal-title" style="color: white" >Modificar empresa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
		
            <form class="formulario" action="btnModificarEmpresa" method="post" enctype="multipart/form-data" style="padding-left: 20px; padding-right: 20px; padding-top: 10px; padding-bottom: 10px;">
                {{csrf_field()}}
                <div class="row">
					<input type="hidden" class="form-control" name="txtIdEmpresa" readonly="true" style="border-radius: 5px" value="{{$empresas->id_empresa}}">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text"  id="idnombreEmpresa" name="nombreEmpresa" class="form-control" value="{{$empresas->nombre_empresa}}" title="El nombre debe llevar solo letras, numeros y espacios" pattern="[A-Za-z0-9\s]+" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Giro</label>
                            <input type="text" id="idgiroEmpresa" name="giroEmpresa" class="form-control" value="{{$empresas->giro}}" pattern="[A-Za-z\s]+" title="El giro debe llevar solo letras y espacios" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Misión</label>
                            <textarea id="idmisionEmpresa" name="misionEmpresa" class="form-control" pattern="[A-Za-z\s]+" title="La mision debe llevar solo letras y espacios" required>{{$empresas->mision}}</textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Visión</label>
                            <textarea id="idvisionEmpresa" name="visionEmpresa" class="form-control" pattern="[A-Za-z\s]+" title="La vision debe llevar solo letras y espacios" required>{{$empresas->vision}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Valores</label>
                            <textarea type="text" id="idvaloresEmpresa" name="valoresEmpresa" class="form-control" pattern="[A-Za-z\s]+"
                            title="Los valores debe llevar solo letras y espacios" required>{{$empresas->valores}}</textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" id="iddireccionEmpresa" name="direccionEmpresa" class="form-control" value="{{$empresas->direccion}}" pattern="[A-Za-z\s#0-9]+" title="La direccion debe llevar solo letras, #, números y espacios" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input type="text" id="idtelefonoEmpresa" name="telefonoEmpresa" class="form-control" value="{{$empresas->telefono}}" pattern="[0-9]+" required="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="text"id="idcorreoEmpresa" name="correoEmpresa" class="form-control" value="{{$empresas->correo_electronico}}" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="El correo debe de llevar un @" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <b><label>Logotipo</label></b>
                            <label>Solo seleccionar archivos si se deseea cambiar la imagen actual</label>
                            <div class="photo">
                                <div class="input-group">
                                <input multiple="multiple"  name="logotipo[]" type="file" accept="image/*" style="padding: 5px 10px; background: #546E7A; color:#fff; border:0px solid #fff;" value="{{$empresas->logotipo}}">
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